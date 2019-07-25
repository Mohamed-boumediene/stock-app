<?php
/**
 * Created by IntelliJ IDEA.
 * User: cheikhna
 * Date: 20/11/17
 * Time: 22:33
 */

require(dirname( dirname(dirname(__FILE__))).'/stock-app/Dao/Dao_add_debt.php');

function Metier_add_debt(){


    Dao_add_debt( $_POST["name"],$_POST["tel"],$_POST["amount"],$_POST["reason"],$_GET['type_debt'],$_POST["date_debt"]);
}
Metier_add_debt();