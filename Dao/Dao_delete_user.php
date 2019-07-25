<?php
/**
 * Created by IntelliJ IDEA.
 * User: cheikhna
 * Date: 20/11/17
 * Time: 13:37
 */




require(dirname( dirname(dirname(__FILE__))).'/stock-app/Dao/logging.php');
require(dirname( dirname(dirname(__FILE__))).'/stock-app/Dao/cnxn.php');
function Dao_delete_user($id){

    $conn = open_cnxn();
    global $log;

    // Check connection
    if (!$conn) {

        $log->error("Connection failed: " . mysqli_connect_error());

    }

    if ($conn) {

        $sql=" DELETE FROM users WHERE  idusers='$id';";

        if (mysqli_query($conn, $sql)) {
            $log->info("delete  done !");
        } else {

            $log->error("Error while delete from   users  table    " . $sql . "\n" . mysqli_error($conn));
        }



        close_cnxn($conn);
    }


}