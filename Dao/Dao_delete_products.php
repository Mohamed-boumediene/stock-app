<?php
/**
 * Created by IntelliJ IDEA.
 * User: cheikhna
 * Date: 27/10/17
 * Time: 17:41
 */




require(dirname( dirname(dirname(__FILE__))).'/stock-app/Dao/logging.php');
require(dirname( dirname(dirname(__FILE__))).'/stock-app/Dao/cnxn.php');


$cmd_id_after_check_products_is_last=0;
function Dao_delete_product($id_product){


    $conn = open_cnxn();
    global $log;
    global $cmd_id_after_check_products_is_last;

    // Check connection
    if (!$conn) {

        $log->error("Connection failed: " . mysqli_connect_error());

    }


    if($conn){

        $is_last_one = Dao_is_last_product($id_product);
        $log->info("method check last return :  ".$is_last_one);
        $log->info("id_cmd is after checklast  :  ".$cmd_id_after_check_products_is_last);
    $sql = "DELETE FROM  cmd_has_products  WHERE products_idproducts='$id_product'";



    if (mysqli_query($conn, $sql)) {


        $sql = "DELETE FROM  products  WHERE idproducts='$id_product'";

        if(mysqli_query($conn, $sql)){


        if($is_last_one == "1"){
            $sql = "DELETE FROM  cmd  WHERE idcmd='$cmd_id_after_check_products_is_last'";
            if (mysqli_query($conn, $sql)) {


            }else{
            $log->error("Error while  delete cmd_id   from table cmd "  . $sql . "\n" . mysqli_error($conn));

        }
        }else{
            $log->info("is_last is not qual to 1 :  ".$is_last_one);
        }


        }else{
            $log->error("Error while  delete  product  from table products "  . $sql . "\n" . mysqli_error($conn));

        }

    }else{

        $log->error("Error while  delete  product_id from  table cmd_has_products  "  . $sql . "\n" . mysqli_error($conn));
    }






  }

    close_cnxn($conn);

}


function Dao_is_last_product($id_product){
    $conn = open_cnxn();
    global $log;
    global $cmd_id_after_check_products_is_last;
    $i=0;
    $id_cmd=0;
    $sql = "SELECT * FROM  cmd_has_products  WHERE products_idproducts='$id_product'";
    if ($result = mysqli_query($conn, $sql)) {

        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {

                $id_cmd=$row["cmd_idcmd"];
                $cmd_id_after_check_products_is_last = $row["cmd_idcmd"];
                break;

            }
        }



        $sql = "SELECT * FROM  cmd_has_products  WHERE cmd_idcmd='$id_cmd'";

        if ($result = mysqli_query($conn, $sql)) {

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {

                    $i++;


                }

                return $i;
            }

        }
    }else{

        $log->error("Error while  check if is_last_product() "  . $sql . "\n" . mysqli_error($conn));
    }

    return"";

}