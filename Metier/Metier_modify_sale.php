<?php
/**
 * Created by IntelliJ IDEA.
 * User: cheikhna
 * Date: 14/11/17
 * Time: 22:57
 */



require(dirname(dirname(dirname(__FILE__))).'/stock-app/Dao/Dao_modify_sale.php');

$log->info($_POST["up1"]);
$log->info($_POST["up2"]);
$log->info($_POST["up3"]);
$log->info($_GET["id_sale_to_modify"]);
$log->info($_POST["mirror_fieldss"]);
$log->info($_GET["selected_item"]);
$log->info($_GET["total_items"]);
$log->info($_GET["price_p"]);
$log->info($_GET["bying_p"]);
$log->info($_GET["ids"]);



function Metier_modify_sale(){


    Dao_modify_sale($_POST["mirror_fieldss"],$_POST["up2"],$_POST["up3"],$_GET["id_sale_to_modify"],$_GET["selected_item"],$_GET["total_items"],$_GET["price_p"],$_GET["bying_p"],$_GET["ids"]);
}


Metier_modify_sale() ;