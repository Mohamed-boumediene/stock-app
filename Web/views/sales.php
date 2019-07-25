

<?php


error_reporting(E_ALL);
ini_set('display_errors', 1);

?>
<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../../Web/img/favicon.ico" />

    <title>متجري</title>

    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- DataTables CSS -->
    <link href="../vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="../vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../css/sb-admin-2.css" rel="stylesheet">
    <!-- Custom  table CSS -->
    <link href="../css/custom-table.css" rel="stylesheet">
    <link href="../css/loading.css" rel="stylesheet">

    <link href="../date_time_picker/bootstrap-datetimepicker.min.css" rel="stylesheet">


    <!-- Custom model-header  CSS -->
    <link href="../css/model-header.css" rel="stylesheet">




    <!-- Custom Fonts -->
    <link href="../font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<?php

//require "../../../../IdeaProjects/stock-app/Metier/Metier_get_all_products.php";
//echo "  is --->  ".   dirname( dirname(dirname(__FILE__)))."/Metier/Metier_get_all_products.php";

require(dirname( dirname(dirname(__FILE__))).'/Metier/Metier_get_all_sales.php');
require(dirname( dirname(dirname(__FILE__))).'/Metier/Metier_get_info_all_sales.php');
include(dirname( dirname(dirname(__FILE__))).'/Metier/Metier_check_session.php');
$sale_table= Metier_get_all_sales();


$info_all_sales= Metier_get_info_all_sales();
$info_user=Metier_check_session();
?>
<body>
<div id="wrapper" style="display:none;">

    <!-- Navigation -->
    <?php  include(dirname( dirname(dirname(__FILE__))).'/Web/views/header.php'); ?>

    <div id="page-wrapper">
        <br>
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"></h1>
            </div><br>
        </div>
        <!-- /.row -->

        <div class="row">
            <?php   if($info_user[1]=="admin"){?>
            <div class="col-lg-8">
                <?php  }else{?>
                <div class="col-lg-12">
                <?php  }?>
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">جدول المبيعات
                        </h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                          <table class="table table-bordered" id="display_sale" cellspacing="0"  width="100%">
                              <thead>
                              <tr>

                                  <th>تاريخ البيع
                                  </th>
                                  <th> إسم  المنتج </th>
                                  <?php   if($info_user[1]=="admin"){?>
                                  <th>السعر   الإجمالي   </th>
                                  <?php  }?>
                                  <th>سعر  الفرد </th>
                                  <th>عدد المنتج</th>
                                  <th>السعر الجديد
                                  </th>
                                  <?php   if($info_user[1]=="admin"){?>
                                  <th>الربح   الإجمالي</th>
                                  <th>ما زاد على الربح
                                  </th>
                                  <?php  }?>
                                  <th>مجموع ما بيع منها</th>

                                  <th><i class="fa fa-cogs fa-align-center fa-2x col-xs-push-1"  aria-hidden="true"></i></th>

                                  <th>
                                      من قبل المستخدم

</th>

                              </tr>
                              </thead>
                               <tbody>
                              <?php
$i=0;
$old="";
                              if (mysqli_num_rows($sale_table) > 0) {


                               while($row = mysqli_fetch_assoc($sale_table )) {
                                   if($info_user[1]=="admin"){
                                   ?>
                                       <tr>
                                           <td><?php echo $row["date_of_sales"]; ?></td>
                                           <td><?php echo $row["name_p"]; ?></td>
                                           <td><?php echo $row["price_p"]; ?></td>
                                           <td><?php echo $row["bying_p"]; ?></td>
                                           <td><?php echo $row["selected_item"]; ?></td>
                                           <td><?php echo $row["new_p"]; ?></td>

                                           <td><?php echo $row["total_benefit"]; ?></td>
                                           <td><?php echo $row["plus_total_benefit"]; ?></td>

                                           <td><?php echo $row["total_bying"]; ?></td>
                                           <td align="center" >
                                               <button class="btn btn-default "
                                                       onclick="modify_sale('<?php echo $row["date_of_sales"]; ?>','<?php echo $row["id_prodcut"]; ?>','<?php echo $row["selected_item"]; ?>','<?php echo $row["new_p"]; ?>','<?php echo $row["price_p"]; ?>','<?php echo $row["bying_p"]; ?>','<?php echo $row["idsales"]; ?>');">
                                                   <em class="fa fa-pencil"></em></button>

                                               <button class="btn btn-danger"
                                                       onclick="delete_sale('<?php echo $row["id_prodcut"]; ?>','<?php echo $row["selected_item"]; ?>','<?php echo $row["idsales"]; ?>');">
                                                   <em class="fa fa-trash"></em></button>

                                               <?php if ($i==0 || $old <> $row["receipt"] ) { $old=$row["receipt"];?>
                                                   <button class="btn btn-info"
                                                           onclick="printreceipt('<?php echo $row["receipt"]; ?>');">
                                                       <i class="fa fa-print" aria-hidden="true"></i></button>
                                               <?php }elseif( $old ==$row["receipt"] ){ ?>

                                               <?php }?>
                                           </td>


                                           <td><?php  echo $row["user"];?></td>

                                       </tr>
                                   <?php }else{
                                       if(trim($row["user"])==trim($info_user[0])){
                                   ?>
                                   <tr>
                                   <td><?php echo $row["date_of_sales"]; ?></td>
                                   <td><?php echo $row["name_p"]; ?></td>
                                           <?php   if($info_user[1]=="admin"){?>
                                   <td><?php echo $row["price_p"]; ?></td>
                                               <?php }?>
                                   <td><?php echo $row["bying_p"]; ?></td>
                                   <td><?php echo $row["selected_item"]; ?></td>
                                   <td><?php echo $row["new_p"]; ?></td>
                                           <?php   if($info_user[1]=="admin"){?>
                                   <td><?php echo $row["total_benefit"]; ?></td>
                                   <td><?php echo $row["plus_total_benefit"]; ?></td>
                                               <?php }?>
                                   <td><?php echo $row["total_bying"]; ?></td>
                                   <td align="center" >
                                   <?php if ($i==0 || $old <> $row["receipt"] ) { $old=$row["receipt"];?>
                                       <button class="btn btn-info"
                                               onclick="printreceipt('<?php echo $row["receipt"]; ?>');">
                                           <i class="fa fa-print" aria-hidden="true"></i></button>
                                   <?php }elseif( $old ==$row["receipt"] ){ ?>

                                       <?php }?>
                                   </td>


                                   <td><?php  echo $row["user"];?></td>

                               </tr>
                                   <?php }}?>
                               <?php  $i++;} }?>



<!-- idsales-->
                               </tbody>
                          </table>

                    </div><!-- /.box-body -->

                </div><!-- /.box -->


            </div>
            <!--end info table  -->
            <?php   if($info_user[1]=="admin"){?>
            <div class="col-lg-4 ">
                <div class="panel panel-default boled">
                    <div class="panel-heading">
                        <i class="fa fa-bell fa-fw"></i> معلومات عن المبيعات

                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">

                        <div class="list-group">
                            <a href="#" class="list-group-item ">

                               <span class="label label-info " style="font-size: 109%;">

                                    <?php echo  $info_all_sales["items"];?>

                               </span>

                                <span class="pull-right  boled ">
                               مجموع العناصر

                                    </span>


                            </a>
                            <a href="#" class="list-group-item">
                                 <span class="label label-info " style="font-size: 109%;">


                                   <?php echo  $info_all_sales["total_purchase_price"];?>

                                 </span>
                                <small>
                                <span class="pull-right boled ">
                                   مجموع الشراء الإجمالي

                                    </span>
                                </small>
                            </a>
                            <a href="#" class="list-group-item">
                                <span class="label label-info " style="font-size: 109%;">
                                <?php echo  $info_all_sales["total_bying_price"];?>
                                </span>
                                <span class="pull-right boled ">
                                   مجموع البيع

                                    </span>
                            </a>
                            <a href="#" class="list-group-item">
                                <span class="label label-info " style="font-size: 109%;">
                                <?php  echo $info_all_sales["total_real_bying_price"];?>
                                </span>
                                <span class="pull-right  boled">
                                   مجموع ما بيع منها

                                    </span>
                            </a>
                            <a href="#" class="list-group-item">
                                <span class="label label-info " style="font-size: 109%;">
                               <?php  echo $info_all_sales["total_benefit_total"];?>
                                </span>
                                <span class="pull-right  boled">مجموع الربح

                                    </span>
                            </a>
                            <a href="#" class="list-group-item">
                                <span class="label label-info " style="font-size: 109%;">
                                <?php  echo $info_all_sales["total_plus_benefit"];?>
                                </span>
                                <span class="pull-right boled ">
                                   ما زاد على الربح

                                    </span>
                            </a>

                        </div>
                        <!-- /.list-group -->
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel info total sales  -->
<br/>
                <div class="panel panel-default">
                    <div class="panel-heading boled">
                        <i class="fa fa-bell fa-fw"></i> معلومات عن  يوم محدد
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="form-group ">
                            <div class="input-group date form_datetime col-lg-12" id="date_info_sale" >
                                <input class="form-control" size="16" type="text" value="" readonly id="in_put_date">
                                <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                            </div>
                            <input type="hidden" id="mirror_field" value="" readonly /><br/>
                        </div>

                        <div class="list-group">
                            <a href="#" class="list-group-item ">

                               <span id="items" class="label label-info " style="font-size: 109%;">

                               </span>

                                <span class="pull-right boled ">
                                                             مجموع العناصر

                                    </span>


                            </a>
                            <a href="#" class="list-group-item">
                                 <span  id="total_purchase_price" class="label label-info " style="font-size: 109%;">

                                 </span>
                                <small>
                                <span class="pull-right boled">
                                                                       مجموع الشراء الإجمالي

                                    </span>
                                </small>
                            </a>
                            <a href="#" class="list-group-item">
                                <span  id="total_bying_price" class="label label-info " style="font-size: 109%;">

                                 </span>
                                <span   class="pull-right  boled">
                                  مجموع البيع
                                    </span>
                            </a>
                            <a href="#" class="list-group-item">

                                <span  id="total_real_bying_price" class="label label-info " style="font-size: 109%;">

                                 </span>
                                <span class="pull-right boled ">
                                                                     مجموع ما بيع منها

                                    </span>
                            </a>
                            <a href="#" class="list-group-item">
                                <span  id="total_benefit_total" class="label label-info " style="font-size: 109%;">

                                 </span>
                                <span class="pull-right boled ">
                                    مجموع الربح
                                    </span>
                            </a>
                            <a href="#" class="list-group-item">
                                <span  id="total_plus_benefit" class="label label-info " style="font-size: 109%;">

                                 </span>
                                <span class="pull-right boled ">
                                  ما زاد على الربح
                                    </span>
                            </a>

                        </div>
                        <!-- /.list-group -->
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel info one days  -->

            </div>
            <!--  end info stock -->
<?php } ?>


        </div>
        <!-- end row info -->



        <br>
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"></h1>
            </div><br>
        </div>
        <!-- /.row footer  -->
        <!-- /#page-wrapper -->
    </div>
</div>
<!-- /#wrapper -->
<div class="loading-bro" id="loading">
    <h1>جار التحميل </h1>
    <svg id="load" x="0px" y="0px" viewBox="0 0 150 150">
        <circle id="loading-inner" cx="75" cy="75" r="60"/>
    </svg>
</div>

</body>



<!-- jQuery -->
<script src="../vendor/jquery/jquery.min.js"></script>




<!-- Bootstrap Core JavaScript -->
<script src="../vendor/bootstrap.min.js"></script>


<script src="../js/loading.js"></script>


<!-- Metis Menu Plugin JavaScript -->
<script src="../vendor/metisMenu/metisMenu.min.js"></script>


<!-- DataTables JavaScript -->
<script src="../vendor/datatables/js/jquery.dataTables.js"></script>
<script src="../vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
<script src="../vendor/datatables-responsive/dataTables.responsive.js"></script>


<script type="text/javascript" src="../js/jy.min.js"></script>

<!-- Custom Theme JavaScript -->
<script src="../js/sb-admin-2.js"></script>

<script src="../date_time_picker/bootstrap-datetimepicker.min.js"></script>
<script src="../date_time_picker/bootstrap-datetimepicker.ar.js"></script>
<script src="../js/custom_date_salepage.js"></script>
<script src="../js/modify_sale.js"></script>
<script src="../js/delete_sale.js"></script>

<?php if($info_user[1]=="admin"){ ?>
    <script type="text/javascript" src="../js/dataTables.buttons.min.js"></script>
<?php }?>
<script type="text/javascript" src="../js/pdfmake.min.js"></script>


<script type="text/javascript" src="../js/vfs_font.js"></script>
<script type="text/javascript" src="../js/jszip.min.js"></script>
<script type="text/javascript" src="../js/buttons.html5.min.js"></script>


<script type="text/javascript" src="../js/get_receipt.js"></script>

<!-- Modal modify product  -->
<div class="modal fade" id="model_modify_sale" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header modal-header-info">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h1><i class="fa fa-pencil-square-o" aria-hidden="true"></i> تغيير المعلومات</h1>
            </div>
            <div class="modal-body">

                <form class="form-horizontal" id="form_modify_sale" onsubmit="return false" method="post" action="">
                    <div class="form-group">
                        <label class="control-label col-sm-2" >تاريخ </label>
                        <div class="col-sm-10">

                            <div class="input-append input-group  date form_datetime">
                                <input class="form-control" size="16" type="text" value="" readonly id="up1" name="up1">
                                <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>

                            </div>
                            <input type="hidden" id="mirror_fieldss" name="mirror_fieldss" value="" readonly /><br/>

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2">العناصر</label>
                        <div class="col-sm-10" id="add_select">


                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >الثمن الجديد</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control"  name="up3" id="up3"  value="none3">
                        </div>
                    </div>


                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">أغلق</button>
                <button type="button"  onclick="submit_sale_form()" class="btn btn-info pull-right" data-dismiss="modal">حفظ التغييرات</button>

            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- Modal -->

<script type="text/javascript">
    $(".form_datetime").datetimepicker({
        format: "dd MM yyyy - hh:ii",
        language:  'ar',
        linkField: "mirror_fieldss",
        linkFormat: "yyyy-mm-dd hh:ii"
    });
</script>



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
                        <button  class="btn btn-danger " id="delete_sale" data-dismiss="modal">نعم</button>

                    </div>

                </div>

            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- Modal -->


<style>


    .boled {
        font-weight: bold;

    }




    .text-danger strong {
        color: #9f181c;
    }
    .receipt-main {
        background: #ffffff none repeat scroll 0 0;
        border-bottom: 12px solid #333333;
        border-top: 12px solid #9f181c;
        margin-top: 50px;
        margin-bottom: 50px;
        padding: 40px 30px !important;
        position: relative;
        box-shadow: 0 1px 21px #acacac;
        color: #333333;
        font-family: open sans;
    }
    .receipt-main p {
        color: #333333;
        font-family: open sans;
        line-height: 1.42857;
    }
    .receipt-footer h1 {
        font-size: 15px;
        font-weight: 400 !important;
        margin: 0 !important;
    }
    .receipt-main::after {
        background: #414143 none repeat scroll 0 0;
        content: "";
        height: 5px;
        left: 0;
        position: absolute;
        right: 0;
        top: -13px;
    }
    .receipt-main thead {
        background: #414143 none repeat scroll 0 0;
    }
    .receipt-main thead th {
        color:#fff;
    }
    .receipt-right h5 {
        font-size: 16px;
        font-weight: bold;
        margin: 0 0 7px 0;
    }
    .receipt-right p {
        font-size: 12px;
        margin: 0px;
    }
    .receipt-right p i {
        text-align: center;
        width: 18px;
    }
    .receipt-main td {
        padding: 9px 20px !important;
    }
    .receipt-main th {
        padding: 13px 20px !important;
    }
    .receipt-main td {
        font-size: 13px;
        font-weight: initial !important;
    }
    .receipt-main td p:last-child {
        margin: 0;
        padding: 0;
    }
    .receipt-main td h2 {
        font-size: 20px;
        font-weight: 900;
        margin: 0;
        text-transform: uppercase;
    }
    .receipt-header-mid .receipt-left h1 {
        font-weight: 100;
        margin: 34px 0 0;
        text-align: right;
        text-transform: uppercase;
    }
    .receipt-header-mid {
        margin: 24px 0;
        overflow: hidden;
    }

    #container {
        background-color: #dcdcdc;
    }

    @media print {


        #id_receipt {
            display: block;
            font-size: 5rem;
        }
    }
    @page
    {
        /* auto is the initial value */
        margin: 0;  /* this affects the margin in the printer settings */
    }
</style>

<div id="id_receipt"style="display: none;">
    <div class="container">
        <div class="row">

            <div class="receipt-main col-xs-10 col-sm-10 col-md-6 col-xs-offset-1 col-sm-offset-1 col-md-offset-3">
                <div class="row">
                    <div class="receipt-header">
                        <div class="col-xs-6 col-sm-6 col-md-6">
                            <div class="receipt-left">
                                <img class="img-responsive" alt="iamgurdeeposahan" src="../img/logo.png" style="width: 171px; border-radius: 43px;">
                            </div>
                        </div>
                        <div class="col-xs-6 col-sm-6 col-md-6 text-right">
                            <div class="receipt-right">
                                <h2><span id="shop_name"></span></h2>
                                <h4> <p><span id="shop_phone"></span> <i class="fa fa-phone"></i></p>
                                </h4>
                               <h4>
                                   <p>سوق نقطة ساخنة <i class="fa fa-location-arrow"></i></p>
                               </h4>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="receipt-header receipt-header-mid">
                        <div class="col-xs-8 col-sm-8 col-md-8 text-left">
                            <div class="receipt-right">

                            </div>
                        </div>
                        <div class="col-xs-4 col-sm-4 col-md-4">
                            <div class="receipt-left text-center">
                                <h1 class="text-center">إيصال</h1>
                            </div>
                        </div>
                    </div>
                </div>

                <div>
                    <table class="table " id="tb-print" style="border: 5px solid #000;">
                        <thead>
                        <tr>
                            <th style="border: 5px solid #000;"> <h3> المنتج </h3></th>
                            <th style="border: 5px solid #000;"> <h3>مبلغ </h3></th>
                        </tr>
                        </thead>
                        <tbody>




                        </tbody>
                    </table>
                </div>

                <div class="row">
                    <div class="receipt-header receipt-header-mid receipt-footer">
                        <div class="col-xs-8 col-sm-8 col-md-8 text-left">
                            <div class="receipt-right">
                               <h3> <p>تاريخ بيع     <br><br><span id="id_date"></span></p>
                               </h3>
                                <h3 style="color: rgb(140, 140, 140);">شكرا لكم على  ثقتكم بنا</h3>
                            </div>
                        </div>
                        <div class="col-xs-4 col-sm-4 col-md-4">
                            <div class="receipt-left">
                                <h1>التوقيع</h1>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>


</div>



</html>