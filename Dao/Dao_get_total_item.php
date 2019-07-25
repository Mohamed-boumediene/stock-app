<?php
/**
 * Created by IntelliJ IDEA.
 * User: cheikhna
 * Date: 14/11/17
 * Time: 21:19
 */

include(dirname( dirname(dirname(__FILE__))).'/stock-app/Dao/logging.php');
require(dirname( dirname(dirname(__FILE__))).'/stock-app/Dao/cnxn.php');

function Dao_get_total_item($id){
    $conn = open_cnxn();
    global $log;

$log->info("id  dao :".$id);

    // Check connection
    if (!$conn) {

        $log->error("Connection failed: " . mysqli_connect_error());

    }
if($conn) {
    $sql = "SELECT rest_products_number FROM products where idproducts ='$id'";
    if ($result = mysqli_query($conn, $sql)) {
        $items="";
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                $items=$row["rest_products_number"];
            }
            }
        $log->info("result :" . $items);
        return $items;
    } else {

        $log->error("Error while getting total item " . $sql . "\n" . mysqli_error($conn));
    }

}

    return "";


}