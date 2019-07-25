<?php
/**
 * Created by IntelliJ IDEA.
 * User: cheikhna
 * Date: 21/12/17
 * Time: 16:18
 */

require(dirname( dirname(dirname(__FILE__))).'/stock-app/Dao/Dao_modify_single_history.php');


function Metier_modify_single_history(){

    Dao_modify_single_history($_POST["reason"],$_POST["date"],$_POST["amount"],$_POST["id"]);


}
Metier_modify_single_history();