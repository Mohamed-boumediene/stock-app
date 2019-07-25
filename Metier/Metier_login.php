<?php
/**
 * Created by IntelliJ IDEA.
 * User: cheikhna
 * Date: 14/11/17
 * Time: 13:58
 */

require(dirname( dirname(dirname(__FILE__))).'/stock-app/Dao/Dao_login.php');

function Metier_login(){
global  $log ;

    $log->info("name : ".$_POST['user']);
    $log->info("pass  : ".$_POST['pass']);



    echo Dao_login($_POST['user'], $_POST['pass']) ;
}

Metier_login();