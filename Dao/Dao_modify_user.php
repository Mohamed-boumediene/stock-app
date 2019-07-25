<?php
/**
 * Created by IntelliJ IDEA.
 * User: cheikhna
 * Date: 20/11/17
 * Time: 13:09
 */



require(dirname( dirname(dirname(__FILE__))).'/stock-app/Dao/logging.php');
require(dirname( dirname(dirname(__FILE__))).'/stock-app/Dao/cnxn.php');


function Dao_modify_user($name,$pass,$role,$id){


    $conn = open_cnxn();
    global $log;

    // Check connection
    if (!$conn) {

        $log->error("Connection failed: " . mysqli_connect_error());

    }

    if ($conn) {
$m_role='';
        if($role == 'مدير'){

            $m_role="admin";
        }else{
            $m_role='users';
        }
        $sql = "update  users  set namess='$name'  , pass='$pass' , role='$m_role' where idusers='$id';";


        if (mysqli_query($conn, $sql)) {

        } else {

            $log->error("Error while  update  users table    " . $sql . "\n" . mysqli_error($conn));
        }



        close_cnxn($conn);
    }


}