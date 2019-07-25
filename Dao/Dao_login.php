<?php
/**
 * Created by IntelliJ IDEA.
 * User: cheikhna
 * Date: 14/11/17
 * Time: 13:58
 */


include(dirname( dirname(dirname(__FILE__))).'/stock-app/Dao/logging.php');
require(dirname( dirname(dirname(__FILE__))).'/stock-app/Dao/cnxn.php');


function Dao_login($user , $pass){
    session_start();
    $conn = open_cnxn();
    global $log;

    // Check connection
    if (!$conn) {

        $log->error("Connection failed: " . mysqli_connect_error());


    }
    if ($conn) {
        $sql =" SELECT  namess,pass,role FROM users WHERE namess='$user' AND pass='$pass'";
        if ($result= mysqli_query($conn, $sql)) {
            $log->info("result");
            $count = mysqli_num_rows($result);
            if($count == 1) {
                $log->info("result==1");
                //session_register("myusername");
                $_SESSION['login_user'] = $user;
            }

            return $count ;
        }else{
            $log->error("Error while login "  . $sql . "\n" . mysqli_error($conn));

        }
    }


    return "";


}