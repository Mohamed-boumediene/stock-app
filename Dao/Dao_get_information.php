<?php
/**
 * Created by IntelliJ IDEA.
 * User: cheikhna
 * Date: 29/10/17
 * Time: 16:44
 */

include(dirname( dirname(dirname(__FILE__))).'/stock-app/Dao/logging.php');
require(dirname( dirname(dirname(__FILE__))).'/stock-app/Dao/cnxn.php');


function Dao_get_information($from,$to){

    $array = array();
    $i=0;
    $conn = open_cnxn();
    global $log;
    $log->info("slam");



    // Check connection
    if (!$conn) {

        $log->error("Connection failed: " . mysqli_connect_error());

    }
    if($conn) {
        $sql ="SELECT * FROM `cmd` WHERE income_date >= '$from' and income_date <= '$to'";
        if ($result = mysqli_query($conn, $sql)) {

            // output data of each row
            //  $log->info("reslt  :".sizeof($result));

            while($row = mysqli_fetch_assoc($result)) {
                //  $log->info("cmd ids :".$row["idcmd"]);
                // $log->info("i  :".$i);
                // $log->info("prnt() :". print_r($result));
                $idcmd = $row["idcmd"];
                $array[$i] = array();
                $array[$i]['idcmd'] = $idcmd;
                $array[$i]["buy_items"]=0;
                $array[$i]["unbuy_items"]=0;
                $array[$i]["total_real_buying"]=0;
                $array[$i]["total_real_benefit"]=0;
                $array[$i]["total_plus_benefit"]=0;
                $array[$i]['total_items']=0;
                $array[$i]['total_price']=0;
                $array[$i]['total_normale_buying']=0;
                $array[$i]["total_normale_benefit"]=0;

                $sql = "SELECT cmd.income_date, products.* FROM products JOIN cmd_has_products ON products.idproducts = cmd_has_products.products_idproducts JOIN cmd ON cmd.idcmd= cmd_has_products.cmd_idcmd where cmd.idcmd='$idcmd'";

                if ($result1 = mysqli_query($conn, $sql)) {
                    if ($result1->num_rows > 0) {
                        // output data of each row
                        while($row = mysqli_fetch_assoc($result1)) {
                            // $log->info("products  :"."\n".json_encode($row));

                            $array[$i]['date_cmd'] = $row["income_date"];
                            $array[$i]['total_items'] = $array[$i]['total_items'] + $row["number_products"];
                            $array[$i]['total_price'] = $array[$i]['total_price'] +$row["price"];
                            $array[$i]['total_normale_buying'] = $array[$i]['total_normale_buying'] +($row["buying_price"] * $row["number_products"]);
                            $array[$i]["total_normale_benefit"]=$array[$i]["total_normale_benefit"]+ ($row["unite_benefit"] * $row["number_products"]);

                            if($row["rest_products_number"] != "0"){
                                $array[$i]["buy_items"]= $array[$i]["buy_items"]+($row["number_products"] - $row["rest_products_number"]);
                                $array[$i]["unbuy_items"]=$array[$i]["unbuy_items"] + $row["rest_products_number"];
                            }

                            $idproducts=$row["idproducts"];
                            $sql ="SELECT * FROM sales WHERE sales.id_prodcut='$idproducts'";
                            if ($result2 = mysqli_query($conn, $sql)) {
                                if ($result2->num_rows > 0) {

                                    while ($row = mysqli_fetch_assoc($result2)) {
                                        //  $log->info("sales  :"."\n".json_encode($row));

                                        $array[$i]["total_real_buying"] =  $array[$i]["total_real_buying"] +  $row["total_bying"];
                                        $array[$i]["total_real_benefit"] =  $array[$i]["total_real_benefit"] + $row["total_benefit"];
                                        $array[$i]["total_plus_benefit"] = $array[$i]["total_plus_benefit"] + $row["plus_total_benefit"] ;
                                    }
                                }

                            }else{
                                $log->error("Error while getting sales  for each products " . $sql . "\n" . mysqli_error($conn));

                            }


                        }//end while each products


                    }//end if each products


                }else{
                    $log->error("Error while getting products for each cmd " . $sql . "\n" . mysqli_error($conn));

                }
                $log->info("i  befor incr :".$i);
                $i = $i + 1 ;
                $log->info("i  after incr :".$i);

            }//end while each cmd  ddd




        }else{
            $log->error("Error while select id cmd " . $sql . "\n" . mysqli_error($conn));

        }


    } else {

        $log->error("Error cnxn " . mysqli_error($conn));
    }
    $total_price=0;
    $total_item=0;
    $total_cmd=0;
    $total_plus_benefit=0;
    $total_normale_benefit=0;
    $total_normale_buying=0;
    $total_real_buying=0;
    $total_real_benefit=0;
    $buy_items=0;
    $unbuy_items=0;
    $info_single_cmd=$array;
    for($i = 0; $i < count($info_single_cmd); $i++) {

        $total_cmd=$total_cmd+1;
        $total_item= $total_item + $info_single_cmd[$i]['total_items'] ;

        $total_price= $total_price +  $info_single_cmd[$i]['total_price'];

        $total_normale_buying = $total_normale_buying + $info_single_cmd[$i]['total_normale_buying'];

        $total_normale_benefit = $total_normale_benefit + $info_single_cmd[$i]["total_normale_benefit"];

        $total_real_buying=$total_real_buying + $info_single_cmd[$i]["total_real_buying"];

        $total_real_benefit = $total_real_benefit + $info_single_cmd[$i]["total_real_benefit"];

        $total_plus_benefit=$total_plus_benefit + $info_single_cmd[$i]["total_plus_benefit"];

        $buy_items= $buy_items + $info_single_cmd[$i]["buy_items"];

        $unbuy_items= $unbuy_items+  $info_single_cmd[$i]["unbuy_items"];

    }

    $result_data=array(
        0 => $total_cmd,
       1=> $total_item,
       2 => $total_price,
       3 => $total_normale_buying,
       4 => $total_normale_benefit,
        5 => $total_real_buying,
        6 =>$total_real_benefit,
        7 =>$total_plus_benefit,
        8=>$buy_items,
       9=> $unbuy_items);
    echo json_encode($result_data);

}
//$info_single_cmd= Dao_get_information('2017-11-06','2017-11-23');


