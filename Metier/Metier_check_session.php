<?php
/**
 * Created by IntelliJ IDEA.
 * User: cheikhna
 * Date: 14/11/17
 * Time: 15:46
 */




require(dirname(dirname(dirname(__FILE__))) . '/stock-app/Dao/Dao_check_session.php');

function Metier_check_session(){
   
    session_start();

    $user_check = Dao_check_session($_SESSION['login_user']);



    if(!isset($user_check[0])){
        header("location:index.html");
        return "";
    }else{

        return array($user_check[0],$user_check[1]);
    }

    return "" ;
}
