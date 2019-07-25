<?php
;

error_reporting(E_ALL);
ini_set('display_errors', 1);




require(dirname( dirname(dirname(__FILE__))).'/stock-app/Dao/logging.php');
require(dirname(dirname(dirname(__FILE__))).'/stock-app/Dao/cnxn.php');


$conn = open_cnxn();
global $log;



function b(){
    header('Content-Type: application/json');
    global $log;
    $log->info("msg from js   :". (string) $_GET['id_product']);

    $r = array('key1' => $_GET['id_product']);

   echo json_encode($r);;

}

b();
/**

 *
select * from products
inner join  cmd_has_products on products.idproducts= cmd_has_products.products_idproducts
where cmd_has_products.cmd_idcmd=47
 *
 */
