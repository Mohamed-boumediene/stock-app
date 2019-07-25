<?php
/**
 * Created by IntelliJ IDEA.
 * User: cheikhna
 * Date: 27/10/17
 * Time: 17:40
 */



require(dirname( dirname(dirname(__FILE__))).'/stock-app/Dao/logging.php');
require(dirname( dirname(dirname(__FILE__))).'/stock-app/Dao/cnxn.php');


function Dao_modify_products($product_id,$product_name,$unite_price,$bying_price,$produt_number)
{


    $conn = open_cnxn();
    global $log;

    // Check connection
    if (!$conn) {

        $log->error("Connection failed: " . mysqli_connect_error());

    }


    if ($conn) {

        $price= $unite_price * $produt_number;

        $unite_benefit= $bying_price - $unite_price;

        $total_benefit= $unite_benefit * $produt_number ;

        $sql = "update  products  set total_benefit='$total_benefit'  , unite_benefit='$unite_benefit', price='$price', name_produts='$product_name',unite_price='$unite_price',buying_price='$bying_price',number_products='$produt_number', rest_products_number='$produt_number'  where idproducts='$product_id';";








        if (mysqli_query($conn, $sql)) {

        } else {

            $log->error("Error while  update  product from  table  products  " . $sql . "\n" . mysqli_error($conn));
        }



        close_cnxn($conn);
    }
}