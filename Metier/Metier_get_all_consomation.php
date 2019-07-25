<?php
/**
 * Created by IntelliJ IDEA.
 * User: cheikhna
 * Date: 19/11/17
 * Time: 18:08
 */
require(dirname( dirname(dirname(__FILE__))).'/stock-app/Dao/Dao_get_all_consomation.php');

function Metier_get_all_consomation(){


     return   Dao_get_all_consomation();
}

