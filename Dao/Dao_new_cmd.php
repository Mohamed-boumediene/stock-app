<?php
/**
 * Created by IntelliJ IDEA.
 * User: cheikhna
 * Date: 25/10/17
 * Time: 20:33
 */

include('../Dao/cnxn.php');
include('../Dao/logging.php');

function Dao_new_cmd($product_date_creation0)
{
    $conn = open_cnxn();
    global $log;

    // Check connection
    if (!$conn) {

        $log->error("Connection failed: " . mysqli_connect_error());

    }

    if ($conn) {

        $sql = "INSERT INTO cmd (income_date) VALUES ('$product_date_creation0')";

        if (mysqli_query($conn, $sql)) {
            $last_id_cmd = mysqli_insert_id($conn);
            close_cnxn($conn);

            return $last_id_cmd;
        }else{

            $log->error("Error while  insert  in cmd table "  . $sql . "\n" . mysqli_error($conn));
        }

        return "";

    }
}//end  Dao_add_cmd


   function Dao_new_products(
        $cmd_id,
        $product_name,
        $product_unite_price,
        $product_buying_price,
        $product_numbers
                            )
 {

      $conn=open_cnxn();
      global $log;
// Check connection
    if ( !$conn ) {

        $log->error("Connection failed: " . mysqli_connect_error());

    }

    if($conn){
$price= $product_unite_price * $product_numbers;

$unite_benefit= $product_buying_price - $product_unite_price;

$total_benefit= $unite_benefit * $product_numbers ;
      /*  $log->info("unite benefit : " .$product_buying_price." -".$price." = ".$unite_benefit);
        $log->info("price : " .$product_unite_price." * ".$product_numbers."= ".$price);
        $log->info("total_benefit : " .$unite_benefit." * ".$product_numbers."= ".$total_benefit);*/

   $sql = "INSERT INTO products (name_produts,unite_price,buying_price,number_products,price,unite_benefit,total_benefit,rest_products_number)

   VALUES ('$product_name','$product_unite_price','$product_buying_price','$product_numbers','$price','$unite_benefit','$total_benefit','$product_numbers')";

                if (mysqli_query($conn, $sql)) {

                   $last_id_products=mysqli_insert_id($conn);
                   $log->info("id_cmd : ".$cmd_id."  id_produt :  ".$last_id_products);

                      $sql = "INSERT INTO cmd_has_products (cmd_idcmd,products_idproducts) VALUES ('$cmd_id','$last_id_products')";


                     if (mysqli_query($conn, $sql)) {


                     } else {

                         $log->error("Error while  insert in keys for cmd and products "  . $sql . "\n" . mysqli_error($conn));

                     }

                } else {

                    $log->error("Error while  insert  new products "  . $sql . "\n" . mysqli_error($conn));

                }

            }
        close_cnxn($conn);
}//end Dao_new_cmd