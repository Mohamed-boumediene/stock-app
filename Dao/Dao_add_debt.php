<?php
/**
 * Created by IntelliJ IDEA.
 * User: cheikhna
 * Date: 20/11/17
 * Time: 22:33
 */

require(dirname( dirname(dirname(__FILE__))).'/stock-app/Dao/logging.php');
require(dirname( dirname(dirname(__FILE__))).'/stock-app/Dao/cnxn.php');

function Dao_add_debt($name,$tel,$amount,$reason,$type_debt,$date){
    $conn = open_cnxn();
    global $log;

    // Check connection
    if (!$conn)
    {

        $log->error("Connection failed: " . mysqli_connect_error());

    }

    if ($conn) {

        $sql = "INSERT INTO debt (namess,tel,amount,debt_type,unpayed) VALUES ('$name','$tel','$amount','$type_debt','$amount')";

        if (mysqli_query($conn, $sql))
        {
            $last_id = mysqli_insert_id($conn);
            $sql1 = "INSERT INTO history_debt (sub_amount,reason,date,id_debt) VALUES ('$amount','$reason','$date','$last_id')";
            if (mysqli_query($conn, $sql1))
            {

            } else
            {

                $log->error("Error while  insert  in history_debt " . $sql1 . "\n" . mysqli_error($conn));
            }

        } else
        {

            $log->error("Error while  insert  in debt table " . $sql . "\n" . mysqli_error($conn));
        }


    }


}