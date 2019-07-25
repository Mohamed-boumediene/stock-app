<?php
/**
 * Created by IntelliJ IDEA.
 * User: cheikhna
 * Date: 21/11/17
 * Time: 00:05
 */
require(dirname(dirname(dirname(__FILE__))).'/stock-app/Dao/Dao_get_debt.php');

function Metier_get_debt(){

return Dao_get_debt();


}