<?php
/**
 * Created by IntelliJ IDEA.
 * User: cheikhna
 * Date: 27/11/17
 * Time: 00:48
 */

require(dirname( dirname(dirname(__FILE__))).'/stock-app/Dao/Dao_get_information.php');

function Metier_get_information(){

     echo Dao_get_information($_POST['datefrom'],$_POST['dateto']);


}

Metier_get_information();