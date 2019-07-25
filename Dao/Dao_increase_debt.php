<?php
/**
 * Created by IntelliJ IDEA.
 * User: cheikhna
 * Date: 20/12/17
 * Time: 22:58
 */



require(dirname( dirname(dirname(__FILE__))).'/stock-app/Dao/logging.php');
require(dirname( dirname(dirname(__FILE__))).'/stock-app/Dao/cnxn.php');

function Dao_increase_debt($date,$reason,$amount,$id,$totaldebt,$payed){

    $conn = open_cnxn();
    global $log;

    // Check connection
    if (!$conn) {

        $log->error("Connection failed: " . mysqli_connect_error());

    }

    if ($conn) {

        $sql = "INSERT INTO  history_debt (sub_amount,reason,date,id_debt) VALUES ('$amount','$reason','$date','$id')";

        if (mysqli_query($conn, $sql)) {
$new_t=$amount + $totaldebt;
$rest= $new_t - $payed ;


            $sql1 = "update  debt  set  amount='$new_t', unpayed='$rest'   where iddebt='$id';";
            if (mysqli_query($conn, $sql1)) {}else{
                $log->error("Error while  update debt in   history debt table    " . $sql . "\n" . mysqli_error($conn));

            }
        } else {

            $log->error("Error while  insert in   history debt table    " . $sql . "\n" . mysqli_error($conn));
        }



        close_cnxn($conn);
    }


}