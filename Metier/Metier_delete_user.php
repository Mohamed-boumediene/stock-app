<?php
/**
 * Created by IntelliJ IDEA.
 * User: cheikhna
 * Date: 20/11/17
 * Time: 13:37
 */



require(dirname( dirname(dirname(__FILE__))).'/stock-app/Dao/Dao_delete_user.php');

function Metier_delete_user(){


    Dao_delete_user($_POST["id"]);

}

Metier_delete_user();