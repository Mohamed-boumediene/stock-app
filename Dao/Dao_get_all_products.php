<?php
/**
 * Created by IntelliJ IDEA.
 * User: cheikhna
 * Date: 27/10/17
 * Time: 17:12
 */


//require "../Dao/cnxn.php";
//require "../Dao/logging.php";
require(dirname( dirname(dirname(__FILE__))).'/stock-app/Dao/logging.php');
require(dirname( dirname(dirname(__FILE__))).'/stock-app/Dao/cnxn.php');
function Dao_get_all_products(){
    $conn = open_cnxn();
    global $log;



    // Check connection
    if (!$conn) {

        $log->error("Connection failed: " . mysqli_connect_error());

    }

      $sql = "SELECT * FROM products WHERE rest_products_number != '0' ORDER BY idproducts DESC";
    if (mysqli_query($conn, $sql)) {


        $result = mysqli_query($conn, $sql);

        return $result;
    }else{

        $log->error("Error while  insert  in cmd table "  . $sql . "\n" . mysqli_error($conn));
    }

        close_cnxn($conn);

    return "";
}

