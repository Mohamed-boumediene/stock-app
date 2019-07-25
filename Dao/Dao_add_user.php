<?php
/**
 * Created by IntelliJ IDEA.
 * User: cheikhna
 * Date: 20/11/17
 * Time: 02:46
 */
require(dirname( dirname(dirname(__FILE__))).'/stock-app/Dao/logging.php');
require(dirname( dirname(dirname(__FILE__))).'/stock-app/Dao/cnxn.php');


function Dao_add_user($name,$pass,$role){

    $conn = open_cnxn();
    global $log;

    // Check connection
    if (!$conn)
    {

        $log->error("Connection failed: " . mysqli_connect_error());

    }

    if ($conn) {

        $sql = "INSERT INTO users (namess,pass,role) VALUES ('$name','$pass','$role')";

        if (mysqli_query($conn, $sql))
        {

        } else
        {

            $log->error("Error while  insert  in user table " . $sql . "\n" . mysqli_error($conn));
        }


    }

}