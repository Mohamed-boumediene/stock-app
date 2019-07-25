<?php
/**
 * Created by IntelliJ IDEA.
 * User: cheikhna
 * Date: 19/11/17
 * Time: 10:10
 */


require(dirname( dirname(dirname(__FILE__))).'/stock-app/Dao/Dao_add_new_consomation.php');



function Metier_add_new_consomation(){

    Dao_add_new_consomation($_POST["amount"],$_POST["comment"],$_POST["time"],$_GET["user"]);


}
Metier_add_new_consomation();