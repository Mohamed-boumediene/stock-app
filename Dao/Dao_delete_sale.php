<?php
/**
 * Created by IntelliJ IDEA.
 * User: cheikhna
 * Date: 15/11/17
 * Time: 08:40
 */

require(dirname(dirname(dirname(__FILE__))).'/stock-app/Dao/logging.php');

require(dirname(dirname(dirname(__FILE__))).'/stock-app/Dao/cnxn.php');


function Dao_delete_sale($id_product,$selected_item,$idsale){
    $conn = open_cnxn();
    global $log;

    $log->info("id  dao :".$id_product);

    // Check connection
    if (!$conn) {

        $log->error("Connection failed: " . mysqli_connect_error());

    }
    if($conn) {
        $sql = "SELECT rest_products_number FROM products where idproducts ='$id_product'";
        if ($result = mysqli_query($conn, $sql)) {
            $items="";
            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    $items=$row["rest_products_number"];
                }
            }
            $log->info("rest product  :" . $items);

            if($items == "0"){
                $sql = "UPDATE  products SET  rest_products_number='$selected_item'  where idproducts ='$id_product'";
                if ($result = mysqli_query($conn, $sql)) {

                }else{
                    $log->error("Error while update rest product  " . $sql . "\n" . mysqli_error($conn));

                }

            }else{
                $incrise_rest= $items + $selected_item ;
                $sql = "UPDATE  products SET  rest_products_number='$incrise_rest'  where idproducts ='$id_product'";
                if ($result = mysqli_query($conn, $sql)) {

                }else{
                    $log->error("Error while update rest product  " . $sql . "\n" . mysqli_error($conn));

                }
            }

            /* delete prodt in sale table */
            $sql = "DELETE FROM sales    where idsales ='$idsale'";
            if ($result = mysqli_query($conn, $sql)) {

            }else{
                $log->error("Error while delete form sales  " . $sql . "\n" . mysqli_error($conn));

            }

        } else {

            $log->error("Error while getting rest  products  " . $sql . "\n" . mysqli_error($conn));
        }

    }




}