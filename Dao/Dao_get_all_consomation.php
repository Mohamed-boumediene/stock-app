<?php
/**
 * Created by IntelliJ IDEA.
 * User: cheikhna
 * Date: 19/11/17
 * Time: 18:09
 */

function Dao_get_all_consomation(){

    $conn = open_cnxn();
    global $log;



    // Check connection
    if (!$conn) {

        $log->error("Connection failed: " . mysqli_connect_error());

    }

    $sql = "SELECT * FROM consomation ORDER BY id DESC ";
    if (mysqli_query($conn, $sql)) {


        $result = mysqli_query($conn, $sql);

        return $result;
    }else{

        $log->error("Error while  get consomation table "  . $sql . "\n" . mysqli_error($conn));
    }

    close_cnxn($conn);

    return "";


}