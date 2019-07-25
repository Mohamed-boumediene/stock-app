<?php
/**
 * Created by IntelliJ IDEA.
 * User: cheikhna
 * Date: 29/12/17
 * Time: 12:53
 */

require(dirname( dirname(dirname(__FILE__))).'/stock-app/Dao/logging.php');
require(dirname( dirname(dirname(__FILE__))).'/stock-app/Dao/cnxn.php');

function Dao_get_history_payed_debt($id){



    $conn = open_cnxn();
    global $log;

    // Check connection
    if (!$conn) {

        $log->error("Connection failed: " . mysqli_connect_error());

    }
    $array = array();
    if ($conn) {

        $sql = "SELECT * FROM show_payed_debt WHERE id_debt='$id' ORDER BY id_payed_debt  DESC  ";

        if (mysqli_query($conn, $sql)) {
            $result = mysqli_query($conn, $sql);
            $i=0;

            while ($row = mysqli_fetch_assoc($result)) {
                $array[$i] = array();
                $array[$i][1] = $row["amount"];
                $array[$i][0] = $row["date"];

                $i++;
            }
            echo json_encode($array);
        } else {

            $log->error("Error while get show_payed_debt table    " . $sql . "\n" . mysqli_error($conn));
        }

//return "";

        close_cnxn($conn);
    }

}