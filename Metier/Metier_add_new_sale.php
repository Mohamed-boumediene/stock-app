<?php
/**
 * Created by IntelliJ IDEA.
 * User: cheikhna
 * Date: 07/11/17
 * Time: 13:44
 */





require(dirname( dirname(dirname(__FILE__))).'/stock-app/Dao/Dao_add_new_sale.php');


$log->info("name_p : ".$_POST['name_p']);
$log->info("price_p  : ".$_POST['price_p']);
$log->info("bying_p  : ".$_POST['bying_p']);
$log->info("selected_item   : ".$_POST['selected_item']);
$log->info("total_item  : ".$_POST['total_item']);
$log->info("new_p  : ".$_POST['new_p']);
$log->info("id_p  : ".$_POST['id_p']);
$log->info("date_operation  : ".$_POST['date_operation']);
$log->info("user : ".$_POST['user']);
$log->info("frst   : ".$_POST['first']);

function Metier_add_sales(){
    Dao_add_sale($_POST['name_p'],$_POST['price_p'],$_POST['bying_p'],$_POST['selected_item'],$_POST['new_p'],$_POST['date_operation'],$_POST['id_p'],$_POST['total_item'],$_POST['user'],$_POST['first']);
}
Metier_add_sales();