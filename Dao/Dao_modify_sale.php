<?php
/**
 * Created by IntelliJ IDEA.
 * User: cheikhna
 * Date: 14/11/17
 * Time: 22:57
 */


require(dirname(dirname(dirname(__FILE__))).'/stock-app/Dao/logging.php');

require(dirname(dirname(dirname(__FILE__))).'/stock-app/Dao/cnxn.php');



function  Dao_modify_sale($date,$new_items,$new_p,$id_sale,$selected_item,$total_items,$price_p,$bying_p,$ids){




    $conn = open_cnxn();
    global $log;

    // Check connection
    if (!$conn) {

        $log->error("Connection failed: " . mysqli_connect_error());

    }


    if ($conn) {

/*
 * name_p,
 * price_p,
 * bying_p,
 * selected_item,
 * new_p,
 * date_of_sales,
 * id_prodcut,
 * plus_total_benefit,
 * total_benefit,
 * total_bying
 * */

//$s=($selected_item - $new_items);
//if($s < 0){ ($s= $s * (-1));}
//$p=$total_items -$new_items ;

$stock= 0;
        $price=0;
        $unite_benefit=0;
        $total_benefits=0;
        $sqls="";
if($new_items > $selected_item){
    $value= $new_items - $selected_item ;
    if($value < 0){ ($value= $value * (-1));}

    $stock = $total_items - $value ;


}else if ( $new_items < $selected_item){
    $value= $new_items - $selected_item ;
    if($value < 0){ ($value= $value * (-1));}

    $stock = $total_items + $value ;

}else if($new_items == $selected_item){
    $log->info("new item == selected ");
if($total_items == '0'){
    $log->info("total iems==0");
    $stock= 0;
    $sqls="select * from products ";
    //request mahi mohim 2la ba6
}else{
    $stock= $total_items ;
  /*  $price= $price_p * $stock;

    $unite_benefit= $bying_p - $price_p;

    $total_benefits= $unite_benefit * $stock ;
    $log->info(" stock". $stock);
    $log->info(" price". $price);
    $log->info("unite_benefi".$unite_benefit);*/

}



}
        $sqls = "update  products  set rest_products_number='$stock'  where idproducts='$id_sale'";


        if (mysqli_query($conn, $sqls)) {
            $benetif_total =0;
            $plus_benefit=0;
            $sales_money=0;
            if($new_p == 0){

                $sales_money =$bying_p * $new_items ;

                $price_money =$price_p * $new_items ;
                $benetif_total= $sales_money  - $price_money ;
                $plus_benefit=0;

            }else{

                $sales_money =$new_p * $new_items ;//3000

                $price_money =$price_p * $new_items ;//1000/
                $benetif_total= $sales_money  - $price_money ;

                $sales_mormale =$bying_p * $new_items ;//2000
                $plus_benefit=$sales_money - $sales_mormale;
                if($plus_benefit <  0){ $plus_benefit =0;}


            }


            $sql = "update  sales  set selected_item='$new_items' , new_p='$new_p',  date_of_sales='$date' ,  plus_total_benefit='$plus_benefit', total_benefit='$benetif_total', total_bying='$sales_money' where idsales='$ids'";
            if (mysqli_query($conn, $sql)) {

            } else {

                $log->error("Error while  update  sale from  table sale " . $sql . "\n" . mysqli_error($conn));
            }

        } else {

            $log->error("Error while  update  product from  table  products  " . $sqls . "\n" . mysqli_error($conn));
        }



        close_cnxn($conn);
    }

}