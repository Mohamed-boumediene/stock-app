<?php
/**
 * Created by IntelliJ IDEA.
 * User: cheikhna
 * Date: 21/12/17
 * Time: 00:58
 */

require(dirname( dirname(dirname(__FILE__))).'/stock-app/Dao/Dao_get_history.php');

function Metier_get_history(){
global  $log;
$log->info("id :".$_POST["id"]);
    echo Dao_get_history($_POST["id"]);


}
Metier_get_history();