<?php
/**
 * Created by IntelliJ IDEA.
 * User: cheikhna
 * Date: 18/11/17
 * Time: 19:22
 */



require(dirname( dirname(dirname(__FILE__))).'/stock-app/Dao/Dao_info_single_cmd.php');

function Metier_info_single_cmd(){
   global $log;

    $log->info("slam");



    return   Dao_info_single_cmd();

}


