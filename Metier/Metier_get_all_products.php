<?php
/**
 * Created by IntelliJ IDEA.
 * User: cheikhna
 * Date: 27/10/17
 * Time: 21:49
 */






//require("../../stock-app/Dao/Dao_get_all_products.php");
require(dirname( dirname(dirname(__FILE__))).'/stock-app/Dao/Dao_get_all_products.php');


function Metier_get_all_products(){

 $result = Dao_get_all_products();

 return $result;
}

?>