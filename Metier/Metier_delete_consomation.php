<?php
/**
 * Created by IntelliJ IDEA.
 * User: cheikhna
 * Date: 20/11/17
 * Time: 00:04
 */

require(dirname( dirname(dirname(__FILE__))).'/stock-app/Dao/Dao_delete_consomation.php');


function Metier_delete_consomation(){

    Dao_delete_consomation($_POST["id"]);

}

Metier_delete_consomation();