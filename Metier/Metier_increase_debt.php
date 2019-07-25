<?php
/**
 * Created by IntelliJ IDEA.
 * User: cheikhna
 * Date: 20/12/17
 * Time: 22:55
 */

require(dirname( dirname(dirname(__FILE__))).'/stock-app/Dao/Dao_increase_debt.php');

function Metier_increase_debt(){
    Dao_increase_debt($_POST["mirror_fieldss"],$_POST["m_comment"],$_POST["m_new_amount"],$_GET["id"],$_POST["to_debt"],$_POST["payed_debt"]);
}

Metier_increase_debt();