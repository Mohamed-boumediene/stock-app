<?php
/**
 * Created by IntelliJ IDEA.
 * User: cheikhna
 * Date: 20/11/17
 * Time: 03:19
 */

require(dirname(dirname(dirname(__FILE__))).'/stock-app/Dao/Dao_get_users.php');

function Metier_get_users(){

  return Dao_get_users();

}