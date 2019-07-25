<?php
/**
 * Created by IntelliJ IDEA.
 * User: cheikhna
 * Date: 21/12/17
 * Time: 16:23
 */

require(dirname( dirname(dirname(__FILE__))).'/stock-app/Dao/logging.php');
require(dirname( dirname(dirname(__FILE__))).'/stock-app/Dao/cnxn.php');

function Dao_modify_single_history($reason,$date,$amount,$id){


    $conn = open_cnxn();
    global $log;

    // Check connection
    if (!$conn) {

        $log->error("Connection failed: " . mysqli_connect_error());

    }

    if ($conn) {

        $sql = "update  history_debt  set sub_amount='$amount'  , reason='$reason' , date='$date' where id_history_bedt='$id'";


        if (mysqli_query($conn, $sql)) {


            $sql1 = "SELECT * FROM history_debt where id_history_bedt='$id'; ";

            if (mysqli_query($conn, $sql1)) {
                $result = mysqli_query($conn, $sql1);
                $id_debt=0;

                while ($row = mysqli_fetch_assoc($result)) {

                    $id_debt = $row["id_debt"];

                }

                $sql2 = "SELECT * FROM debt where iddebt='$id_debt'; ";

                if (mysqli_query($conn, $sql2)) {
                    $result = mysqli_query($conn, $sql2);
                    $total = 0;
                    $payed_debt = 0;

                    while ($row = mysqli_fetch_assoc($result)) {

                        $payed_debt= $row["payed"];

                    }
                    $sql3 = "SELECT * FROM history_debt where id_debt='$id_debt'; ";
                    if (mysqli_query($conn, $sql3)) {

                        $result = mysqli_query($conn, $sql3);

                        $sub_total=0;
                        while ($row = mysqli_fetch_assoc($result)) {

                            $sub_total=$sub_total+ $row["sub_amount"];

                        }

                          $un_p=$sub_total -$payed_debt;


                            $sql4 = "update  debt  set  amount='$sub_total', unpayed='$un_p'   where iddebt='$id_debt';";
                            if (mysqli_query($conn, $sql4)) {}else{
                                $log->error("Error while  update debt in   history debt table    " . $sql4 . "\n" . mysqli_error($conn));

                            }

                    }

                }

            } else {

                $log->error("Error while get info from history table    " . $sql1 . "\n" . mysqli_error($conn));
            }
        }else {

            $log->error("Error while  update  single  history table    " .$sql. "\n" . mysqli_error($conn));
        }



        close_cnxn($conn);
    }
}