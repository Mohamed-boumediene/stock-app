<?php
/**
 * Created by IntelliJ IDEA.
 * User: cheikhna
 * Date: 21/11/17
 * Time: 21:04
 */


require(dirname( dirname(dirname(__FILE__))).'/stock-app/Dao/Dao_pay_debt.php');

function Metier_pay_debt(){

Dao_pay_debt($_POST["unpayed"],$_POST["id"],$_POST["payed"],$_POST["amount"],$_POST["date"]);


}


Metier_pay_debt();