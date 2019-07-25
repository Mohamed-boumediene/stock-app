<?php
/**
 * Created by IntelliJ IDEA.
 * User: cheikhna
 * Date: 30/10/17
 * Time: 21:12
 */

require(dirname( dirname(dirname(__FILE__))).'/stock-app/Dao/Dao_delete_products.php');

function Metier_delete_product(){
    global $log;
    $log->info("id_product".$_POST['id_product_to_delete']);


Dao_delete_product($_POST['id_product_to_delete']);



}

Metier_delete_product();