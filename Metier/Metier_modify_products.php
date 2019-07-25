<?php
/**
 * Created by IntelliJ IDEA.
 * User: cheikhna
 * Date: 31/10/17
 * Time: 13:22
 */




require(dirname( dirname(dirname(__FILE__))).'/stock-app/Dao/Dao_modify_products.php');

function Metier_modify_products(){


    global $log;
    $log->info("modify_product_name  : ".$_POST['modify_product_name']);
    $log->info("modify_unite_price   :".$_POST['modify_unite_price']);
    $log->info("modify_bying_price   :".$_POST['modify_bying_price']);
    $log->info("modify_product_number:".$_POST['modify_product_number']);


    $log->info("id_product_to_modify :".$_GET['id_product_to_modify']);


    Dao_modify_products($_GET['id_product_to_modify'],
                        $_POST['modify_product_name'],
                        $_POST['modify_unite_price'],
                        $_POST['modify_bying_price'],
                        $_POST['modify_product_number']);
}

Metier_modify_products();