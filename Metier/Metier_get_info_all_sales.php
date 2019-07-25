<?php
/**
 * Created by IntelliJ IDEA.
 * User: cheikhna
 * Date: 12/11/17
 * Time: 21:31
 */

require(dirname(dirname(dirname(__FILE__))).'/stock-app/Dao/Dao_get_info_all_sales.php');

function Metier_get_info_all_sales(){


    return  Dao_get_info_all_sale();
}