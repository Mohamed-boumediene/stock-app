<?php
/**
 * Created by IntelliJ IDEA.
 * User: cheikhna
 * Date: 12/11/17
 * Time: 21:32
 */



include_once(dirname(dirname(dirname(__FILE__))).'/stock-app/Dao/Dao_get_all_sales.php');

$all_sales = Dao_get_all_sales();

function Dao_get_info_all_sale()
{
    $items=0;
    $total_purchase_price=0;
    $total_bying_price=0;
    $total_real_bying_price=0;
    $total_benefit_total=0;
    $total_plus_benefit=0;
global  $all_sales ;


    if (mysqli_num_rows($all_sales) > 0) {
        while ($row = mysqli_fetch_assoc($all_sales)) {

$items = $items + $row["selected_item"] ;
$total_purchase_price = ($total_purchase_price +  ($row["price_p"] *  $row["selected_item"])) ;
$total_bying_price = ($total_bying_price+  ($row["bying_p"] *  $row["selected_item"])) ;
if($row["new_p"] == '0'){
    $total_real_bying_price = ($total_real_bying_price +  ($row["bying_p"] *  $row["selected_item"])) ;

}else{
    $total_real_bying_price = ($total_real_bying_price +  ($row["new_p"] *  $row["selected_item"])) ;

}



        }
        $total_benefit_total = $total_real_bying_price -$total_purchase_price ;
        $total_plus_benefit = $total_bying_price - $total_real_bying_price ;
        if($total_plus_benefit <0){
            $total_plus_benefit = $total_plus_benefit * (-1);
        }
    }
    $data = array("items"=>$items,
        "total_purchase_price"=>$total_purchase_price,
        "total_bying_price"=>$total_bying_price,
        "total_real_bying_price"=>$total_real_bying_price,
        "total_benefit_total"=>$total_benefit_total,
        "total_plus_benefit"=>$total_plus_benefit);

/*   echo $data["items"]     ,$data["total_purchase_price"],
    $data["total_bying_price"],
    $data["total_real_bying_price"],
    $data["total_benefit_total"],
    $data["total_plus_benefit"] ;*/
    return  $data ;
}

