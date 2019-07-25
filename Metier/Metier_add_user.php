<?php
/**
 * Created by IntelliJ IDEA.
 * User: cheikhna
 * Date: 20/11/17
 * Time: 02:45
 */


require(dirname( dirname(dirname(__FILE__))).'/stock-app/Dao/Dao_add_user.php');

function Metier_add_user(){

    Dao_add_user($_POST["name"],$_POST["pass"],$_GET["role"]);



}

Metier_add_user();