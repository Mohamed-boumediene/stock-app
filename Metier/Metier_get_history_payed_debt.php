<?php
/**
 * Created by IntelliJ IDEA.
 * User: cheikhna
 * Date: 29/12/17
 * Time: 12:50
 */
require(dirname( dirname(dirname(__FILE__))).'/stock-app/Dao/Dao_get_history_payed_debt.php');

function Metier_get_history_payed_debt(){
    global  $log;
    $log->info("id :".$_POST["id"]);
    echo Dao_get_history_payed_debt($_POST["id"]);


}
Metier_get_history_payed_debt();