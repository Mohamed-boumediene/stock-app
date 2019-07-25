<?php
/**
 * Created by IntelliJ IDEA.
 * User: cheikhna
 * Date: 21/11/17
 * Time: 21:13
 */

require(dirname( dirname(dirname(__FILE__))).'/stock-app/Dao/logging.php');
require(dirname( dirname(dirname(__FILE__))).'/stock-app/Dao/cnxn.php');

function Dao_pay_debt($unpayed,$id,$payed,$amount,$date){


    $conn = open_cnxn();
    global $log;

    // Check connection
    if (!$conn) {

        $log->error("Connection failed: " . mysqli_connect_error());

    }

    if ($conn) {
$n_unpayed= $unpayed - $amount;
$n_payed= $payed  + $amount;

        $sql = "update  debt  set unpayed='$n_unpayed',  payed='$n_payed' where iddebt='$id';";


        if (mysqli_query($conn, $sql)) {

            $sql1 = "INSERT show_payed_debt (amount,date,id_debt) VALUES ('$amount','$date','$id');";


            if (mysqli_query($conn, $sql1)) {

            }
        } else {

            $log->error("Error while  update   unpayed in debt table    " . $sql . "\n" . mysqli_error($conn));
        }



        close_cnxn($conn);
    }

}