<?php
/**
 * Created by IntelliJ IDEA.
 * User: cheikhna
 * Date: 19/11/17
 * Time: 10:10
 */


require(dirname( dirname(dirname(__FILE__))).'/stock-app/Dao/logging.php');
require(dirname( dirname(dirname(__FILE__))).'/stock-app/Dao/cnxn.php');


function Dao_add_new_consomation($amounts,$reason,$date,$user)
{
    $conn = open_cnxn();
    global $log;

    // Check connection
    if (!$conn)
    {

        $log->error("Connection failed: " . mysqli_connect_error());

    }

    if ($conn) {

        $sql = "INSERT INTO consomation (amount,reason,dates,users) VALUES ('$amounts','$reason','$date','$user')";

        if (mysqli_query($conn, $sql))
        {

        } else
        {

            $log->error("Error while  insert  in consomation table " . $sql . "\n" . mysqli_error($conn));
        }


              }
}