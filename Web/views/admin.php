
<?php


error_reporting(E_ALL);
ini_set('display_errors', 1);

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">

    <meta name="author" content="">
    <link rel="shortcut icon"  sizes="180x180" href="../../Web/img/favicon.ico" />

    <title>متجري</title>

    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <link href="../css/loading.css" rel="stylesheet">


    <!-- Custom model-header  CSS -->
    <link href="../css/model-header.css" rel="stylesheet">

    <!-- Custom  date CSS -->
    <link href="../css/date.css" rel="stylesheet">

    <!-- Custom  table CSS -->
    <link href="../css/custom-table.css" rel="stylesheet">

    <!-- tabs CSS -->
    <link href="../css/tabs.css" rel="stylesheet">

    <!-- DataTables CSS -->
    <link href="../vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="../vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="../vendor/morrisjs/morris.css" rel="stylesheet">

    <link href="../css/switch.css" rel="stylesheet">

    <link href="../css/checkbox_style.css" rel="stylesheet">


    <link href="../date_time_picker/bootstrap-datetimepicker.min.css" rel="stylesheet">

    <link href="../css/datepicker.css" rel="stylesheet">

    <link href="../css/coustomcard.css" rel="stylesheet">

    <link href="https://cdn.datatables.net/buttons/1.2.2/css/buttons.bootstrap.min.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="../font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body >

<?php

//require "../../../../IdeaProjects/stock-app/Metier/Metier_get_all_products.php";
//echo "  is --->  ".   dirname( dirname(dirname(__FILE__)))."/Metier/Metier_get_all_products.php";

require(dirname( dirname(dirname(__FILE__))).'/Metier/Metier_get_all_products.php');
require(dirname( dirname(dirname(__FILE__))).'/Metier/Metier_check_session.php');
require(dirname( dirname(dirname(__FILE__))).'/Metier/Metier_info_single_cmd.php');
$stock_table= Metier_get_all_products();
$info_user=Metier_check_session();
$info_single_cmd = Metier_info_single_cmd();

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
?>
<div id="wrapper" style="display:none;"  >

    <?php  include(dirname( dirname(dirname(__FILE__))).'/Web/views/header.php'); ?>

    <div id="page-wrapper" >
        <br>
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"></h1>
            </div><br>
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-md-12">
                <!-- Nav tabs -->
                <div class="card">
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active pull-right boled"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">المخزون</a></li>
                        <?php if($info_user[1]=="admin"){ ?>
                            <li role="presentation" class="pull-right boled"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">إنشاء طلبية </a></li>
                        <?php }?>
                        <li role="presentation" class="pull-right boled"><a href="#sale" aria-controls="sale" role="tab" data-toggle="tab" style="color: black;" >البيع</a></li>

                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="home">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="panel " id="mypanel">
                                        <div class="panel-heading">


                                        </div>
                                        <!-- /.panel-heading -->
                                        <div class="panel-body">
                                            <table width="100%" class=" colorchange table table-striped table-bordered table-hover" id="dataTables-example">
                                                <thead>
                                                <tr>
                                                    <th>  </th>
                                                    <th> إسم  المنتج </th>
                                                    <?php   if($info_user[1]=="admin"){?>
                                                        <th>السعر   الإجمالي   </th>
                                                        <th>سعر  الفرد </th>
                                                    <?php  }?>
                                                    <th>  سعر   &nbsp;    بيع&nbsp;الفرد </th>
                                                    <?php   if($info_user[1]=="admin"){?>
                                                        <th>الربح  &nbsp; من  &nbsp;&nbsp; الفرد</th>
                                                        <th>الربح   الإجمالي</th>
                                                    <?php  }?>
                                                    <th>العدد   الحالي</th>
                                                    <?php   if($info_user[1]=="admin"){?>
                                                        <th style="">العدد   الأصلي </th>
                                                        <th style="">رقم   المنتج</th>
                                                    <?php  }?>

                                                    <?php if($info_user[1]=="admin"){ ?>
                                                        <th><i class="fa fa-cogs fa-align-center fa-2x col-xs-push-1"  aria-hidden="true"></i></th>
                                                    <?php }?>

                                                </tr>
                                                </thead>
                                                <tbody>
                                                <!-- name_produts







idproducts

if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
            echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
        }
    } else {
        echo "0 results";
    }
-->
                                                <?php


                                                if (mysqli_num_rows($stock_table) > 0) {
                                                    while($row = mysqli_fetch_assoc($stock_table)) {
                                                        ?>
                                                        <tr class="">
                                                            <td>
                                                                <div class="checkbox radio-margin">
                                                                    <label>
                                                                        <input type="checkbox" value="<?php  echo $row["name_produts"];?>,<?php echo  $row["unite_price"];  ?>,<?php echo  $row["buying_price"];  ?>,<?php echo  $row["rest_products_number"];  ?>,<?php echo  $row["idproducts"];  ?>">
                                                                        <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                                                    </label>
                                                                </div>
                                                            </td>

                                                            <td style="width: 200px;"><?php  echo $row["name_produts"];?></td>
                                                            <?php   if($info_user[1]=="admin"){?>
                                                                <td ><?php echo  $row["price"];  ?></td>
                                                                <td style="width: 200px;"><?php echo  $row["unite_price"];  ?></td>
                                                            <?php }?>
                                                            <td ><?php echo  $row["buying_price"];  ?></td>
                                                            <?php   if($info_user[1]=="admin"){?>
                                                                <td style="width: 200px;"><?php echo  $row["unite_benefit"];  ?></td>
                                                                <td ><?php echo  $row["total_benefit"];  ?></td>
                                                            <?php }?>
                                                            <td style="width: 200px;"><?php echo  $row["rest_products_number"];  ?></td>
                                                            <?php   if($info_user[1]=="admin"){?>
                                                                <td ><?php echo  $row["number_products"];  ?></td>
                                                                <td style="width: 200px;"><?php  echo $row["idproducts"];?></td>
                                                            <?php }?>

                                                            <?php if($info_user[1]=="admin"){ ?>
                                                                <td align="center" style="width: 200px;" >
                                                                    <button class="btn btn-default " onclick="modify_product('<?php echo  $row["idproducts"];  ?>','<?php  echo $row["name_produts"];?>','<?php echo  $row["unite_price"];  ?>','<?php echo  $row["buying_price"];  ?>','<?php echo  $row["number_products"];  ?>');"><em class="fa fa-pencil"></em></button>

                                                                    <button class="btn btn-danger"  onclick="delete_product('<?php echo  $row["idproducts"];  ?>');"><em class="fa fa-trash"></em></button>

                                                                </td>
                                                            <?php }?>
                                                        </tr>
                                                    <?php  } }?>
                                                </tbody>

                                            </table>
                                            <!-- /.table-responsive -->

                                        </div>
                                        <!-- /.panel-body -->
                                    </div>
                                    <!-- /.panel -->
                                </div>
                                <!-- /.col-lg-12 -->
                            </div>
                            <!-- /.row stock tables  -->
                        </div>
                        <!-- end  tabs stock table-->
                        <?php if($info_user[1]=="admin" ){ ?>
                            <div role="tabpanel" class="tab-pane" id="profile">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="panel panel-default " id="mypanel">
                                            <div class="panel-heading">
                                                <div class="row">
                                                    <div class="col-xs-6 text-capitalize">
                                                        <!--- --> إنشاء  طلبية
                                                    </div>
                                                    <div class="col-xs-3">

                                                    </div>
                                                    <div class="col-xs-3  col-xs-pull-1 col-md-pull-0">
                                                        <a class="c-btn c-datepicker-btn" id="add-new-item" href="#" onclick="add_new_item();">
                                                            <i class="fa fa-plus-circle  fa-2x">
                                                                <span id="newitem " class="hidden-xs hidden-sm ">إضافة </span>

                                                            </i>
                                                        </a>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="panel-body">

                                                <form  class="form-horizontal"  id="myfrm"  action="#" method="#">
                                                    <div class="scrollable">
                                                        <table class="table   " cellspacing="0"  width="100%" id="mytable">
                                                            <thead >
                                                            <tr>
                                                                <th class="text-center">العدد </th>
                                                                <th class="text-center">  سعر بيع   الفرد</th>
                                                                <th class="text-center">سعر  الفرد</th>
                                                                <th class="text-center">إسم المنتج</th>
                                                                <th >   <i class="fa fa-cogs fa-align-center fa-2x col-xs-push-1"  aria-hidden="true"></i></th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <tr>
                                                                <td>
                                                                    <div class="form-group">
                                                                        <div class="col-xs-12">
                                                                            <input type="email" class="form-control" id="product-numbers0"  name="product-numbers0" placeholder=" أدخل العدد ">
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-group">
                                                                        <div class="col-xs-12">
                                                                            <input type="email" class="form-control" id="product-buying-price0" name="product-buying-price0" placeholder="   أدخل سعر بيع  الفرد">
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-group">
                                                                        <div class="col-xs-12">
                                                                            <input type="email" class="form-control" id="product-unite-price0" name="product-unite-price0" placeholder=" أدخل سعر  الفرد ">
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-group">
                                                                        <div class="col-xs-12">
                                                                            <input type="email" class="form-control" id="product-name0"  name="product-name0" placeholder="أدخل إسم المنتج">
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-group">
                                                                        <div class="col-xs-8">
                                                                            <button class="btn btn-danger   glyphicon glyphicon-remove " onclick="deleteRow($(this))" ></button>

                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            </tbody>
                                                        </table>

                                                    </div>

                                                    <!-- hiden input date-->
                                                    <input type="hidden"  id="product-date-creation0"  value="inputdate" name="product-date-creation0" >

                                                    <!-- hiden input count-->
                                                    <input type="hidden"  id="count"  value="before_submit" name="count" >

                                                </form>
                                                <!--end form -->
                                            </div>
                                            <div class="panel-footer">
                                                <div class="row">
                                                    <div class="col-xs-4">

                                                        <label for="dateofbirth">إختر التاريخ</label>

                                                        <input class="form-control" id="cmd-date"  name="real-date-cmd-creation" type="text" placeholder="from">

                                                    </div>

                                                    <div class="col-xs-4 pull-right col-xs-offset-3 ">

                                                        <a class="c-btn c-datepicker-btn" data-toggle="modal" id="form-sub">
                                                            <span class="material-icon">حفظ</span>
                                                        </a>

                                                    </div>
                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                        <!-- end  tabs create new item  in stock table-->
                        <div role="tabpanel" class="tab-pane  fade in" id="sale">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="panel " style="margin-bottom: 0px;">
                                        <div class="panel-heading " >
                                            <div class="row">
                                                <div class="col-lg-6" id="total_pro">
                                                    <h2>المجموع <span class="label label-info">  0  آوقية </span></h2>

                                                </div>
                                                <div class="col-lg-6">
                                                    <h2>
                                                        <button class="btn btn-info btn-xs  pull-right" id="change_total"  onclick="sale_change_total()">
                                                            <span class="material-icon">تغيير المجموع  </span>
                                                        </button>
                                                    </h2>
                                                </div>
                                            </div>


                                        </div>
                                        <!-- /.panel-heading -->
                                        <div class="panel-body">
                                            <div class="">
                                                <table  width="100%"  cellspacing="0" class="table dt-responsive  " id="dataTables-sale">
                                                    <thead>
                                                    <tr>
                                                        <th> إسم  المنتج </th>

                                                        <th>سعر  الفرد </th>

                                                        <th>  سعر   &nbsp;    بيع&nbsp;الفرد </th>
                                                        <th>العدد   الحالي</th>
                                                        <th>تغيير سعر     بيع الفرد  </th>
                                                        <?php   if($info_user[1]=="admin"){?>
                                                            <th style="">id_pro</th>
                                                        <?php } ?>



                                                    </tr>
                                                    </thead>
                                                    <tbody>



                                                    </tbody>
                                                </table>
                                            </div>
                                            <!-- /.table-responsive -->
                                        </div>
                                        <!-- /.panel-body -->
                                        <div class="panel-footer" style="background-color: #fff">
                                            <div class="row">
                                                <div class="col-lg-7">
                                                    <div class="form-group">
                                                        <div class="input-group date form_datetime col-md-7" data-date="2017-02-21T05:25:07Z" data-date-format="dd MM yyyy - HH:ii p">
                                                            <input class="form-control" size="16" type="text" value="" readonly>
                                                            <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                                                            <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                                                        </div>
                                                        <input type="hidden" id="mirror_field" value="" readonly /><br/>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 pull-right">
                                                    <a class="c-btn c-datepicker-btn"  id="sale_btn">
                                                        <span class="material-icon">حفظ</span>
                                                    </a>
                                                    <!--  user how did it -->
                                                    <input type="hidden"  id="user_did_it"  value=" <?php echo $info_user[0] ; ?>" name="user_did_it" >

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.panel -->


                                </div>

                            </div>


                        </div>
                        <!-- end  tabs stock table-->
                        <!-- end  tabs sale-->
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row tabs stock   -->
        <?php if($info_user[1]=="admin"){ ?>
            <div class="row">
                <div class="col-lg-8">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">معلومات عن كل طلبية</h3>
                        </div><!-- /.box-header -->
                        <div class="box-body">
                            <table width="100%" class="  table table-striped table-bordered table-hover" id="dataTables_info_cmd">
                                <thead>
                                <tr>
                                    <th>رقم الطلبية  </th>
                                    <th>التاريخ
                                    </th>
                                    <th>مجموع العناصر
                                    </th>
                                    <th>مجموع الشراء الإجمالي</th>
                                    <th>مجموع البيع الطبيعي
                                    </th>
                                    <th>مجموع الربح الطبيعي
                                    </th>
                                    <th>مجموع ما بيع منها
                                    </th>
                                    <th>مجموع الربح منها
                                    </th>
                                    <th>ما زاد على الربح
                                    </th>
                                    <th>العناصر التي بيعت
                                    </th>
                                    <th>العناصر المتبقية</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php


                                $info_single_cmd=array_reverse($info_single_cmd);

                                for($i = 0; $i < count($info_single_cmd); $i++) {


                                    ?>
                                    <tr>
                                        <td><?php  $total_cmd=$total_cmd+1; echo $info_single_cmd[$i]['idcmd'];?></td>
                                        <td><?php  echo $info_single_cmd[$i]['date_cmd'];?></td>
                                        <td><?php  $total_item= $total_item + $info_single_cmd[$i]['total_items'] ;echo $info_single_cmd[$i]['total_items'];?></td>
                                        <td><?php   $total_price= $total_price +  $info_single_cmd[$i]['total_price']; echo $info_single_cmd[$i]['total_price'];?></td>
                                        <td><?php   $total_normale_buying = $total_normale_buying +$info_single_cmd[$i]['total_normale_buying']; echo $info_single_cmd[$i]['total_normale_buying'];?></td>
                                        <td><?php  $total_normale_benefit = $total_normale_benefit +$info_single_cmd[$i]["total_normale_benefit"]; echo $info_single_cmd[$i]["total_normale_benefit"];?></td>
                                        <td><?php  $total_real_buying=$total_real_buying +$info_single_cmd[$i]["total_real_buying"]; echo $info_single_cmd[$i]["total_real_buying"];?></td>
                                        <td><?php  $total_real_benefit = $total_real_benefit + $info_single_cmd[$i]["total_real_benefit"];echo $info_single_cmd[$i]["total_real_benefit"];?></td>
                                        <td><?php $total_plus_benefit=$total_plus_benefit + $info_single_cmd[$i]["total_plus_benefit"]; echo $info_single_cmd[$i]["total_plus_benefit"];?></td>
                                        <td><?php  $buy_items= $buy_items +$info_single_cmd[$i]["buy_items"];  echo $info_single_cmd[$i]["buy_items"];?></td>
                                        <td><?php $unbuy_items= $unbuy_items+$info_single_cmd[$i]["unbuy_items"]; echo $info_single_cmd[$i]["unbuy_items"];?></td>
                                    </tr>
                                <?php   }  ?>
                                </tbody>


                            </table>

                        </div><!-- /.box-body -->

                    </div><!-- /.box -->

                    <!-- end table info cmd  -->

                    <div class="row">

                        <div class="col-lg-5">
                            <div class="input-group">
                                <input class="form-control" id="dateto" type="text"  placeholder="إلى">

                                <span class="input-group-addon">
                                <span class="">  إلى</span>
                            </span>
                            </div>

                        </div>
                        <div class="col-lg-2">
                            <a class="c-btn c-datepicker-btn" id="add-new-item" href="javascript:void(0);" onclick="get_result();" style="    border-bottom-left-radius: 2px;
    border-bottom-right-radius: 43px;
    border-top-left-radius: 43px;
    border-top-right-radius: 0px;
    line-height: 47px;
    font-size: 15px;">
                                <i class="fa fa-calculator fa-2x">

                                </i>
                            </a>
                        </div>
                        <div class="col-lg-5">
                            <div class="input-group">
                                <input class="form-control" id="datefrom" type="text" placeholder="من">
                                <span class="input-group-addon">
                                <span class="">من</span>
                            </span>
                            </div>
                        </div>
                    </div><!-- end date section  --><br>
                    <div class="row ">


                        <div class="col-lg-6">
                            <div class="">
                                <div class="thumbnail" style="height: 361px;">
                                    <div class="caption">
                                        <div class='col-lg-12'>
                                            <span class="glyphicon glyphicon-credit-card"></span>
                                            <span class="glyphicon glyphicon-exclamation-sign pull-right text-info"></span>
                                        </div>
                                        <div class='col-lg-12 well well-add-card text-center'>
                                            <h4>النتيجة</h4>
                                        </div>
                                        <div class='row'>
                                            <p class="pull-right col-lg-6 boled">مجموع ما بيع منها
                                            </p><br>
                                            <p class=" pull-left col-lg-6">
                                            <span id="5" class="label label-info " style="font-size: 109%;">
                                          0 </span>
                                            </p>
                                        </div>
                                        <div class='row'>
                                            <p class="pull-right col-lg-6 boled">مجموع الربح منها
                                            </p><br>
                                            <p class="pull-left col-lg-6">
                                        <span id="6"  class="label label-info " style="font-size: 109%;">
                                           0 </span>
                                            </p>
                                        </div>
                                        <div class='row'>
                                            <p class="pull-right col-lg-6 boled">ما زاد على الربح
                                            </p><br>
                                            <p class="pull-left col-lg-6">
                                        <span id="7" class="label label-info " style="font-size: 109%;">
                                          0 </span>
                                            </p>
                                        </div>
                                        <div class='row'>
                                            <p class="pull-right col-lg-6 boled">العناصر التي بيعت
                                            </p><br>
                                            <p class="pull-left col-lg-6">
                                        <span id="8"class="label label-info " style="font-size: 109%;">
                                           0 </span>
                                            </p>
                                        </div>
                                        <div class='row'>
                                            <p class="pull-right col-lg-6 boled">العناصر المتبقية</p><br>
                                            <p class="pull-left col-lg-6">
                                        <span id="9"class="label label-info " style="font-size: 109%;">
                                           0 </span>
                                            </p>
                                        </div>


                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="">
                                <div class="thumbnail" style="height: 361px;">
                                    <div class="caption">
                                        <div class='col-lg-12'>
                                            <span class="glyphicon glyphicon-credit-card"></span>
                                            <span class="glyphicon glyphicon-exclamation-sign pull-right text-info"></span>
                                        </div>
                                        <div class='col-lg-12 well well-add-card text-center'>
                                            <h4>النتيجة</h4>
                                        </div>
                                        <div class='row'>
                                            <p class="pull-right col-lg-6 boled">مجموع الطلبيات
                                            </p><br>
                                            <p class=" pull-left col-lg-6">
                                            <span id="0"class="label label-info " style="font-size: 109%;">
                                           0 </span>
                                            </p>
                                        </div>
                                        <div class='row'>
                                            <p class="pull-right col-lg-6 boled">مجموع العناصر</p><br>
                                            <p class="pull-left col-lg-6">
                                        <span id="1"class="label label-info " style="font-size: 109%;">
                                          0 </span>
                                            </p>
                                        </div>
                                        <div class='row'>
                                            <p class="pull-right col-lg-6 boled">مجموع الشراء الإجمالي
                                            </p><br>
                                            <p class="pull-left col-lg-6">
                                        <span id="2"class="label label-info " style="font-size: 109%;">
                                          0 </span>
                                            </p>
                                        </div>
                                        <div class='row'>
                                            <p class="pull-right col-lg-6 boled">مجموع البيع الطبيعي
                                            </p><br>
                                            <p class="pull-left col-lg-6">
                                        <span id="3"class="label label-info " style="font-size: 109%;">
                                           0 </span>
                                            </p>
                                        </div>
                                        <div class='row'>
                                            <p class="pull-right col-lg-6 boled">مجموع الربح الطبيعي
                                            </p><br>
                                            <p class="pull-left col-lg-6">
                                        <span id="4"class="label label-info " style="font-size: 109%;">
                                           0 </span>
                                            </p>
                                        </div>


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
                <!--end info table  -->
                <div class="col-lg-4 ">
                    <div class="panel panel-default">
                        <div class="panel-heading boled">
                            <i class="fa fa-bell fa-fw text-info"></i> معلومات عامة عن المخزون
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">

                            <div class="list-group">
                                <a href="#" class="list-group-item ">

                               <span class="label label-info " style="font-size: 109%;">

                                    <?php echo $total_cmd ;?>

                               </span>

                                    <span class="pull-right boled ">
                                  مجموع الطلبيات

                                    </span>


                                </a>
                                <a href="#" class="list-group-item">
                                 <span class="label label-info " style="font-size: 109%;">


                                   <?php echo  $total_item;?>

                                 </span>
                                    <small>
                                <span class="pull-right boled ">
                                    مجموع العناصر
                                    </span>
                                    </small>
                                </a>
                                <a href="#" class="list-group-item">
                                <span class="label label-info " style="font-size: 109%;">
                                <?php echo  $total_price;?>
                                </span>
                                    <span class="pull-right boled ">
                                    مجموع الشراء الإجمالي

                                    </span>
                                </a>
                                <a href="#" class="list-group-item">
                                <span class="label label-info " style="font-size: 109%;">
                                <?php  echo $total_normale_buying;?>
                                </span>
                                    <span class="pull-right boled ">
مجموع البيع الطبيعي
                                    </span>
                                </a>
                                <a href="#" class="list-group-item">
                                <span class="label label-info " style="font-size: 109%;">
                               <?php  echo $total_normale_benefit;?>
                                </span>
                                    <span class="pull-right boled ">
                                    مجموع الربح الطبيعي

                                    </span>
                                </a>
                                <a href="#" class="list-group-item">
                                <span class="label label-info " style="font-size: 109%;">
                                <?php  echo $total_real_buying;?>
                                </span>
                                    <span class="pull-right  boled">
                                   مجموع ما بيع منها

                                    </span>
                                </a>
                                <a href="#" class="list-group-item">
                                <span class="label label-info " style="font-size: 109%;">
                                <?php  echo $total_real_benefit;?>
                                </span>
                                    <span class="pull-right boled ">
                                   مجموع الربح منها

                                    </span>
                                </a>
                                <a href="#" class="list-group-item">
                                <span class="label label-info " style="font-size: 109%;">
                                <?php  echo $total_plus_benefit;?>
                                </span>
                                    <span class="pull-right  boled">
                                 ما زاد على الربح

                                    </span>
                                </a>
                                <a href="#" class="list-group-item">
                                <span class="label label-info " style="font-size: 109%;">
                                <?php

                                /* if($buy_items<0){
                                     echo 0;
                                 }else{
                                     echo $buy_items;
                                 }*/
                                echo $buy_items;
                                ?>
                                </span>
                                    <span class="pull-right  boled">
                                   العناصر التي بيعت

                                    </span>
                                </a>
                                <a href="#" class="list-group-item">
                                <span class="label label-info " style="font-size: 109%;">
                                <?php  echo $unbuy_items;?>
                                </span>
                                    <span class="pull-right boled ">
                                   العناصر المتبقية
                                    </span>
                                </a>

                            </div>
                            <!-- /.list-group -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel info total sales  -->


                </div>

                <!-- /.panel -->

            </div>
            <!--  end info stock -->

        <?php }?>
    </div>
    <!-- end row info -->
    <!-- /#page-wrapper -->
</div>
</div>
<!-- /#wrapper -->




<!-- Modal submit form success -->
<div class="modal fade" id="info" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header modal-header-info">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h1><i class="fa fa-check-circle-o" aria-hidden="true"></i> تمت العملية بنجاح </h1>
            </div>
            <div class="modal-body">
            </div>
            <div class="modal-footer">
                <button  class="btn btn-default pull-left" data-dismiss="modal">أغلق
                </button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- Modal -->




<!-- Modal submit form warning  -->
<div class="modal fade" id="warning" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header modal-header-warning">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h1><i class="fa fa-exclamation-circle" aria-hidden="true"></i> Warning Modal</h1>
            </div>
            <div class="modal-body">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- Modal -->

<!-- Modal delete -->
<div class="modal fade" id="danger" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header modal-header-warning">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h1><i class="fa fa-question-circle-o" aria-hidden="true"></i>هل أنت متأكد   </h1>
            </div>
            <div class="modal-body">
                <form  class="form-horizontal" id="delele_product_form"  action="#" method="#">
                    <input type="hidden"  value="78" name="id_product_to_delete" id="id_product_to_delete">

                </form>
            </div>
            <div class="modal-footer">
                <div class="">
                    <div class="clo-xs-5 pull-left" >
                        <button  class="btn btn-info "  data-dismiss="modal">لا</button>

                    </div>
                    <div class="clo-xs-5 pull-right">
                        <button  class="btn btn-danger " id="delete_product" data-dismiss="modal">نعم</button>

                    </div>

                </div>

            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- Modal -->


<!-- Modal modify product  -->
<div class="modal fade" id="model_modify_product" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header modal-header-info">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h1><i class="fa fa-pencil-square-o" aria-hidden="true"></i>   تغيير المعلومات</h1>
            </div>
            <div class="modal-body">

                <form class="form-horizontal" id="form_modify_product">
                    <div class="form-group">
                        <label class="control-label col-sm-2" >إسم المنتج</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control"  name="modify_product_name"  id="up1" value="none1">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2">سعر الفرد</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="modify_unite_price"  id="up2" value="none2" >
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >سعر   بيع الفرد</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control"  name="modify_bying_price" id="up3"  value="none3">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >العدد الحالي</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name ="modify_product_number" id="up4" value="none4" >
                        </div>
                    </div>


                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">أغلق</button>
                <button type="button"  id="submit_update_product_form" class="btn btn-info pull-right" data-dismiss="modal">حفظ التغييرات
                </button>

            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- Modal -->


<div class="loading-bro" id="loading">
    <h1>جار التحميل</h1>
    <svg id="load" x="0px" y="0px" viewBox="0 0 150 150">
        <circle id="loading-inner" cx="75" cy="75" r="60"/>
    </svg>
</div>
<!-- jQuery -->
<script src="../vendor/jquery/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="../vendor/bootstrap.min.js"></script>


<!-- DataTables JavaScript -->
<script src="../vendor/datatables/js/jquery.dataTables.js"></script>
<script src="../vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
<script src="../vendor/datatables-responsive/dataTables.responsive.js"></script>
<script src=""></script>
<script src="../js/add_or_drop_rows_in_DataTable.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="../vendor/metisMenu/metisMenu.min.js"></script>

<!-- Morris Charts JavaScript -->
<!--<script src="../vendor/raphael/raphael.min.js"></script>
<script src="../vendor/morrisjs/morris.min.js"></script>
<script src="../vendor/data/morris-data.js"></script>-->









<!-- Custom Theme JavaScript -->
<script src="../js/sb-admin-2.js"></script>

<!-- create new tr in table -->
<script src="../js/dynamic-row.js"></script>

<!-- Custom submit-form JavaScript -->
<script src="../js/submit-from.js"></script>

<!-- Custom delete_product JavaScript -->
<script src="../js/delete_product.js"></script>


<script src="../js/modify_product.js"></script>



<script src="../date_time_picker/bootstrap-datetimepicker.min.js"></script>
<script src="../date_time_picker/bootstrap-datetimepicker.ar.js"></script>

<script src="../js/date_timePicker_custom.js"></script>

<script src="../js/switch_btn.js"></script>



<script src="../js/submit_sale_data.js"></script>

<script src="../js/change_total_sales.js"></script>

<script src="../js/cmd_info.js"></script>

<script src="../js/calculator-from-to.js"></script>


<!-- Page-Level Demo Scripts - Tables - Use for reference -->






<script type="text/javascript" src="../js/jy.min.js"></script>
<script type="text/javascript" src="../js/datepicker.js"></script>




<?php if($info_user[1]=="admin"){ ?>
    <script type="text/javascript" src="../js/dataTables.buttons.min.js"></script>
<?php }?>
<script type="text/javascript" src="../js/pdfmake.min.js"></script>


<script type="text/javascript" src="../js/vfs_font.js"></script>
<script type="text/javascript" src="../js/jszip.min.js"></script>
<script type="text/javascript" src="../js/buttons.html5.min.js"></script>







<style>
    ul.dt-button-collection{
        background-color: #e5e5e5;
        border: 1px solid #c0c0c0;
    }
    li.dt-button a:hover{
        background-color: transparent;
        color: #115094;
        font-weight: bold;
    }
    li.dt-button.active a,
    li.dt-button.active a:hover,
    li.dt-button.active a:focus{
        color: #337ab6;
        background-color: transparent;
        font-weight: bold;
    }
    li.dt-button.active a::before{
        content: '✔ ';
    }
    .dataTables_info {
        font-size: 0.8em;
        margin-top: -12px;
        text-align: right;
    }
    .previous a,
    .next a
    {
        font-weight: bold;
    }

    .buttons-excel{
        color: #ffffff;
        text-decoration: none;
        font-size: 16px;

    }
    .boled{
        font-weight: bold;
    }

</style>

</body>

</html>

