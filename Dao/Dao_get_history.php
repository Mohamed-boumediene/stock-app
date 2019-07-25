<?php
/**
 * Created by IntelliJ IDEA.
 * User: cheikhna
 * Date: 21/12/17
 * Time: 00:59
 */

require(dirname( dirname(dirname(__FILE__))).'/stock-app/Dao/logging.php');
require(dirname( dirname(dirname(__FILE__))).'/stock-app/Dao/cnxn.php');

function Dao_get_history($id){



    $conn = open_cnxn();
    global $log;

    // Check connection
    if (!$conn) {

        $log->error("Connection failed: " . mysqli_connect_error());

    }
    $array = array();
    if ($conn) {

        $sql = "SELECT * FROM history_debt WHERE id_debt='$id' ORDER BY id_history_bedt  DESC  ";

        if (mysqli_query($conn, $sql)) {
            $result = mysqli_query($conn, $sql);
            $i=0;

            while ($row = mysqli_fetch_assoc($result)) {
                $array[$i] = array();
                $array[$i][0] = $row["sub_amount"];
                $array[$i][1] = $row["reason"];
                $array[$i][2] = $row["date"];
                $array[$i][3] = $row["id_history_bedt"];
$i++;
            }
            echo json_encode($array);
        } else {

            $log->error("Error while  update  debt table    " . $sql . "\n" . mysqli_error($conn));
        }

//return "";

        close_cnxn($conn);
    }

}