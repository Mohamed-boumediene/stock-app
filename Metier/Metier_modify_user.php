<?php
/**
 * Created by IntelliJ IDEA.
 * User: cheikhna
 * Date: 20/11/17
 * Time: 13:09
 */


require(dirname( dirname(dirname(__FILE__))).'/stock-app/Dao/Dao_modify_user.php');



function Metier_modify_user(){

    global  $log ;

    Dao_modify_user($_POST["m_name"],$_POST["m_pass"],$_POST["m_role"],$_GET["id"]);

    $log->info($_POST["m_name"]);
    $log->info($_POST["m_pass"]);
    $log->info($_POST["m_role"]);
    $log->info($_GET["id"]);

}

Metier_modify_user();