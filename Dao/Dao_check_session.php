<?php
/**
 * Created by IntelliJ IDEA.
 * User: cheikhna
 * Date: 14/11/17
 * Time: 15:45
 */

//require(dirname( dirname(dirname(__FILE__))).'/stock-app/Dao/logging.php');
//require(dirname( dirname(dirname(__FILE__))).'/stock-app/Dao/cnxn.php');




function Dao_check_session($user_check){
    $conn = open_cnxn();
    global $log;

    // Check connection
    if (!$conn) {

        $log->error("Connection failed: " . mysqli_connect_error());


    }
    if ($conn) {
        $sql = " SELECT  namess,role FROM users WHERE namess='$user_check'";

        if ($re=mysqli_query($conn, $sql)) {

            $row = mysqli_fetch_array($re, MYSQLI_ASSOC);

            return array($row['namess'] , $row['role']);

        }
    }

return "" ;
}


