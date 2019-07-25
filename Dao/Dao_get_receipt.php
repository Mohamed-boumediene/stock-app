<?php
/**
 * Created by IntelliJ IDEA.
 * User: cheikhna
 * Date: 15/12/17
 * Time: 02:44
 */

include(dirname( dirname(dirname(__FILE__))).'/stock-app/Dao/logging.php');
require(dirname( dirname(dirname(__FILE__))).'/stock-app/Dao/cnxn.php');

function Dao_get_receipt($receipt){

    $conn = open_cnxn();
    global $log;
    $array = array();



    // Check connection
    if (!$conn) {

        $log->error("Connection failed: " . mysqli_connect_error());

    }

    if($conn){
        $sql ="SELECT * FROM sales WHERE receipt='$receipt'";
        if($result = mysqli_query($conn, $sql)){
            if ($result->num_rows > 0) {
                $i=0;

                while ($row = mysqli_fetch_assoc($result)) {
                    $array[$i] = array();
                    $array[$i][0] = $row["name_p"];
                    $array[$i][1] = $row["selected_item"];

                    if($row["new_p"] == "0"){
                        $array[$i][2] = $row["bying_p"];

                    }else{
                        $array[$i][2] = $row["new_p"];
                    }

                    $array[$i][3] = $row["date_of_sales"];
                    $array[$i][4] = $row["tel_shop"];
                    $array[$i][5] = $row["name_shop"];
                    $i++;

                }

                echo json_encode($array);
            }

        }else{
            $log->error("Error while getting receipt " . $sql . "\n" . mysqli_error($conn));

        }
    }

}
