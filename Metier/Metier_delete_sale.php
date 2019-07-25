<?php
/**
 * Created by IntelliJ IDEA.
 * User: cheikhna
 * Date: 15/11/17
 * Time: 08:35
 */



require(dirname(dirname(dirname(__FILE__))).'/stock-app/Dao/Dao_delete_sale.php');
function Metier_delete_sale(){



    Dao_delete_sale($_POST['idpro'],$_POST['selected_item'],$_POST['idsale']);

}

Metier_delete_sale();