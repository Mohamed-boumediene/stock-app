<?php
/**
 * Created by IntelliJ IDEA.
 * User: cheikhna
 * Date: 19/11/17
 * Time: 21:41
 */


require(dirname( dirname(dirname(__FILE__))).'/stock-app/Dao/logging.php');
require(dirname( dirname(dirname(__FILE__))).'/stock-app/Dao/cnxn.php');


function Dao_modify_consomation($m_amount,$m_date,$m_comment,$id){


    $conn = open_cnxn();
    global $log;

    // Check connection
    if (!$conn) {

        $log->error("Connection failed: " . mysqli_connect_error());

    }

    if ($conn) {

        $sql = "update  consomation  set amount='$m_amount'  , reason='$m_comment', dates='$m_date'  where id='$id';";


        if (mysqli_query($conn, $sql)) {

        } else {

            $log->error("Error while  update  consomation  table    " . $sql . "\n" . mysqli_error($conn));
        }



        close_cnxn($conn);
    }

}