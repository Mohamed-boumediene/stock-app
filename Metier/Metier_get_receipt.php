<?php
/**
 * Created by IntelliJ IDEA.
 * User: cheikhna
 * Date: 15/12/17
 * Time: 02:43
 */

include(dirname( dirname(dirname(__FILE__))).'/stock-app/Dao/Dao_get_receipt.php');

function Metier_get_receipt(){

  echo  Dao_get_receipt($_POST['receipt']);

}
Metier_get_receipt();