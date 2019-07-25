<?php
/**
 * Created by IntelliJ IDEA.
 * User: cheikhna
 * Date: 19/11/17
 * Time: 21:41
 */


require(dirname( dirname(dirname(__FILE__))).'/stock-app/Dao/Dao_modify_consomation.php');
function Metier_modify_consomation (){

    Dao_modify_consomation($_POST["m_amount"],$_POST["m_date"],$_POST["m_comment"],$_GET["id"]);
}

Metier_modify_consomation ();