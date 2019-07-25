<?php
/**
 * Created by IntelliJ IDEA.
 * User: cheikhna
 * Date: 24/10/17
 * Time: 13:03
 */



include('../Dao/Dao_new_cmd.php');


function Metier_new_products($last_cmd_id){

    global $log;

     $i=0;

    for($i;$i<=$_POST["count"];$i++){

        Dao_new_products
        (
            $last_cmd_id,
            $_POST['product-name'.$i],
            $_POST['product-unite-price'.$i],
            $_POST['product-buying-price'.$i],
            $_POST['product-numbers'.$i]
        );
     /*   $log->info("iteration   ---> ".$i."\n");
        $log->info("name   ---> ".$_POST['product-name'.$i]."\n");
        $log->info("product-unite-price   ---> ".$_POST['product-unite-price'.$i]."\n");
        $log->info("product-buying-price  ---> ".$_POST['product-buying-price'.$i]."\n");
        $log->info("product-numbers  ---> ".$_POST['product-numbers'.$i]."\n");*/

    }

    $log->info("test from Metier".$_POST['product-date-creation0']);




}





function Meteri_new_cmd(){
    global $log;
   $last_cmd_id= Dao_new_cmd($_POST['product-date-creation0']);


   if($last_cmd_id != ""){
       Metier_new_products($last_cmd_id);
       $log->info("last_id_cmd is  ---> ".$last_cmd_id);
   }else{

       $log->error("last_id_cmd is null ---> ".$last_cmd_id);

   }
}

Meteri_new_cmd();