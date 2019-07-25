<?php
/**
 * Created by IntelliJ IDEA.
 * User: cheikhna
 * Date: 14/11/17
 * Time: 21:19
 */

require(dirname( dirname(dirname(__FILE__))).'/stock-app/Dao/Dao_get_total_item.php');

function Metier_get_total_item(){

global  $log;
$log->info("id meteri:".$_POST['id']);

   echo  Dao_get_total_item($_POST['id']);

}

Metier_get_total_item();