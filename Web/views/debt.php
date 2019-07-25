

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

    <link href="../css/date.css" rel="stylesheet">

    <link href="../css/select-tag.css" rel="stylesheet">






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


//require(dirname( dirname(dirname(__FILE__))).'/Dao/logging.php');
//require(dirname( dirname(dirname(__FILE__))).'/Dao/cnxn.php');
include(dirname( dirname(dirname(__FILE__))).'/Metier/Metier_check_session.php');
include(dirname( dirname(dirname(__FILE__))).'/Metier/Metier_get_debt.php');

$info_user=Metier_check_session();
$debt=Metier_get_debt();

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

            <div class="col-lg-12 ">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <i class="fa fa-bell fa-fw"></i> إضافة دين جديد

                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <form  class="form-horizontal"  id="form-debt">
                            <div class="list-group">
                                <div class="list-group-item" >
                                    <div class="row">
                                    <div class="col-lg-6">
                                        <div class="input-group">
                                            <input id="name" type="text" class="form-control"  name="name" placeholder="الإسم">
                                            <span class="input-group-addon ">  الإسم</span>

                                        </div><br>
                                        <div class="input-group">
                                            <input id="tel" type="text" class="form-control"  name="tel" placeholder="رقم الهاتف">
                                            <span class="input-group-addon ">رقم الهاتف
</span>

                                        </div><br>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="input-group">
                                            <input id="amount" type="text" class="form-control"  name="amount" placeholder="المبلغ">
                                            <span class="input-group-addon ">  المبلغ</span>

                                        </div><br>
                                        <div class="input-group">
                                            <input id="reason" type="text" class="form-control"  name="reason" placeholder="السبب ">
                                            <span class="input-group-addon ">السبب</span>

                                        </div>
                                    </div>
                                    </div>
                                    <!-- Split button -->
                                    <div class="row">
                                        <div class="col-lg-6 ">
                                            <div class="md-select" >

                                                <label for="ul-id"><button type="button" class="ng-binding  btn   c-btn c-datepicker-btn"> نوع الدين </button></label>
                                                <ul role="listbox" id="ul-id" class="md-whiteframe-z1" aria-activedescendant="state2_AK" name="ul-id">
                                                    <li role="option" id="state2_AK" class="ng-binding ng-scope active" tabindex="-1" aria-selected="true">دين علي</li>
                                                    <li role="option" id="state2_AL" class="ng-binding ng-scope" tabindex="-1" aria-selected="false">دين لي</li>

                                                </ul>

                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <div class="input-group date form_datetime col-md-7" data-date="2017-02-21T05:25:07Z" data-date-format="dd MM yyyy - HH:ii p">
                                                        <input class="form-control" size="16" type="text" value="" readonly>
                                                        <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                                                        <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                                                    </div>
                                                    <input type="hidden" id="mirror_field"  name="date_debt" value="" readonly /><br/>
                                                </div>
                                            </div>



                                        </div>

                                        <div class="col-lg-6">

                                            <a class="c-btn c-datepicker-btn" id="debt-sub" href="#" >
                                                <i class="fa fa-plus-circle  fa-2x">
                                                    <span id="newitem " class="hidden-xs hidden-sm "> إضافة
</span>

                                                </i>
                                            </a>


                                        </div>
                                    </div>
                                </div>


                        </form>




                    </div>
                    <!-- /.list-group -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel info total sales  -->

        </div>
        <!--  end add user  -->
        <div class="row">
            <div class="col-lg-6">

                <div class="">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">دين لي</h3>
                        </div><!-- /.box-header -->
                        <div class="box-body">
                            <table class="table table-bordered" id="display_debt2" cellspacing="0"  width="100%">
                                <thead>
                                <tr>

                                    <th>الإسم</th>
                                    <th>رقم الهاتف
                                    </th>
                                    <th>المبلغ</th>

                                    <th>المدفوع</th>
                                    <th>الباقي</th>
                                    <th><i class="fa fa-cogs fa-align-center fa-2x " aria-hidden="true"></i></th>
                                    <th><i class="fa fa-cogs fa-align-center fa-2x " aria-hidden="true"></i></th>


                                </tr>
                                </thead>
                                <tbody>
                                <?php

                                if (mysqli_num_rows($debt) > 0) {
                                    while($row = mysqli_fetch_assoc($debt)) {
                                        if($row["debt_type"]=="دين لي"){
                                        ?>
                                        <tr>
                                            <td><?php  echo $row["namess"];?></td>
                                            <td><?php  echo $row["tel"];?></td>
                                            <td><?php  echo $row["amount"];?></td>
                                            <td><?php  echo $row["payed"];?></td>
                                            <td><?php  echo $row["unpayed"];?></td>




                                            <td align="center" >

                                                <button class="btn btn-info " onclick="pay_debt('<?php  echo $row["iddebt"];?>','<?php  echo $row["payed"];?>','<?php  echo $row["unpayed"];?>');"><em class="fa fa-usd"></em></button>

                                                <button class="btn " style="    background-color: #18a78c;
    border-color: #18a78c;     color: #fff;" onclick="show_history_payed('<?php  echo $row["iddebt"];?>');"><em class="fa fa-history"></em></button>

                                            </td>
                                            <td>

                                                <button class="btn btn-primary " onclick="open_to_increase_debt('<?php  echo $row["iddebt"];?>','<?php  echo $row["payed"];?>','<?php  echo $row["amount"];?>');"><em class="fa fa-money"></em></button>

                                                <button class="btn btn-success" onclick="show_history('<?php  echo $row["iddebt"];?>');"><em class="fa fa-history"></em></button>

                                            </td>


                                        </tr>
                                    <?php  } }}?>
                                <!-- idsales-->
                                </tbody>
                            </table>
                            <div class="col-lg-12">
                                <br>
                                <div class="panel panel-default" style="    height: 45px;
    text-align: center;     padding-top: 10px;     padding-left: 10px;">

                        <span class="col-lg-3 pull-left" style="    font-size: 13px;
    font-weight: bold;">آوقية</span>
                                    <span  id="totl_debt2"class="label label-info col-lg-4 " style="font-size: 109%;">
  0
</span>
                                    <span class="col-lg-5 pull-right" style="    font-size: 13px;
    font-weight: bold;">مجموع دين لي</span>

                                </div>
                            </div>
                        </div><!-- /.box-body -->

                    </div><!-- /.box -->


                </div>
                <!--end info table user   -->

            </div>


            <div class="col-lg-6">
                <div class="">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">دين علي</h3>
                        </div><!-- /.box-header -->
                        <div class="box-body">
                            <table class="table table-bordered" id="display_debt" cellspacing="0"  width="100%">
                                <thead>
                                <tr>

                                    <th>الإسم</th>
                                    <th>رقم الهاتف
                                    </th>
                                    <th>المبلغ</th>

                                    <th>المدفوع</th>
                                    <th>الباقي</th>
                                    <th><i class="fa fa-cogs fa-align-center fa-2x " aria-hidden="true"></i></th>
                                    <th><i class="fa fa-cogs fa-align-center fa-2x " aria-hidden="true"></i></th>



                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $debt=Metier_get_debt();
                                if (mysqli_num_rows($debt) > 0) {
                                    while($row = mysqli_fetch_assoc($debt)) {
                                        if($row["debt_type"]=="دين علي"){
                                        ?>
                                        <tr>
                                            <td><?php  echo $row["namess"];?></td>
                                            <td><?php  echo $row["tel"];?></td>
                                            <td><?php  echo $row["amount"];?></td>

                                            <td><?php  echo $row["payed"];?></td>
                                            <td><?php  echo $row["unpayed"];?></td>



                                            <td align="center" >

                                                <button class="btn btn-info " onclick="pay_debt('<?php  echo $row["iddebt"];?>','<?php  echo $row["payed"];?>','<?php  echo $row["unpayed"];?>');"><em class="fa fa-usd"></em></button>

                                                <button class="btn " style="    background-color: #18a78c;
    border-color: #18a78c;     color: #fff;" onclick="show_history_payed('<?php  echo $row["iddebt"];?>');"><em class="fa fa-history"></em></button>



                                            </td>
                                                <td>

                                                    <button class="btn btn-primary " onclick="open_to_increase_debt('<?php  echo $row["iddebt"];?>','<?php  echo $row["payed"];?>','<?php  echo $row["amount"];?>');"><em class="fa fa-money"></em></button>

                                                      <button class="btn btn-success" onclick="show_history('<?php  echo $row["iddebt"];?>');"><em class="fa fa-history"></em></button>

                                                </td>

                                        </tr>
                                    <?php  } }}?>
                                <!-- idsales-->
                                </tbody>
                            </table>
                            <div class="col-lg-12">
                                <br>
                                <div class="panel panel-default" style="    height: 45px;
    text-align: center;     padding-top: 10px;     padding-left: 10px;">

                        <span class="col-lg-3 pull-left" style="    font-size: 13px;
    font-weight: bold;">آوقية</span>
                                    <span  id="totl_debt1"class="label label-info col-lg-4 " style="font-size: 109%;">
  0
</span>
                                    <span class="col-lg-5 pull-right" style="    font-size: 13px;
    font-weight: bold;">مجموع دين علي</span>

                                </div>
                            </div>
                        </div><!-- /.box-body -->

                    </div><!-- /.box -->


                </div>
                <!--end info table user   -->
            </div>

        </div>


    </div>
    <!-- end row info -->



    <br>
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"></h1>
        </div><br>
    </div>

    <br>
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"></h1>
        </div><br>
    </div>

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
    <h1>جار التحميل</h1>
    <svg id="load" x="0px" y="0px" viewBox="0 0 150 150">
        <circle id="loading-inner" cx="75" cy="75" r="60"/>
    </svg>
</div>

</body>



<!-- jQuery -->
<script src="../vendor/jquery/jquery.min.js"></script>




<!-- Bootstrap Core JavaScript -->
<script src="../vendor/bootstrap.min.js"></script>


<script src="../js/datatable-debt.js"></script>


<!-- Metis Menu Plugin JavaScript -->
<script src="../vendor/metisMenu/metisMenu.min.js"></script>


<!-- DataTables JavaScript -->
<script src="../vendor/datatables/js/jquery.dataTables.js"></script>
<script src="../vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
<script src="../vendor/datatables-responsive/dataTables.responsive.js"></script>



<!-- Custom Theme JavaScript -->
<script src="../js/sb-admin-2.js"></script>

<script src="../date_time_picker/bootstrap-datetimepicker.min.js"></script>
<script src="../date_time_picker/bootstrap-datetimepicker.ar.js"></script>


<script src="../js/debt-submit.js"></script>

<script src="../js/select-tag.js"></script>


<script src="../js/modify_debt.js"></script>



<script src="../js/pay_debt.js"></script>




<script type="text/javascript" src="../js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="../js/pdfmake.min.js"></script>


<script type="text/javascript" src="../js/vfs_font.js"></script>
<script type="text/javascript" src="../js/jszip.min.js"></script>
<script type="text/javascript" src="../js/buttons.html5.min.js"></script>


<script src="../date_time_picker/bootstrap-datetimepicker.min.js"></script>
<script src="../date_time_picker/bootstrap-datetimepicker.ar.js"></script>

<script src="../js/date_timePicker_custom.js"></script>

<script src="../js/increase_debt.js"></script>

<script src="../js/show_history.js"></script>
<script src="../js/show_payed_debt.js"></script>



<!-- Modal modify product  -->
<div class="modal fade" id="model_modify_debt" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header modal-header-info">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h1><i class="fa fa-pencil-square-o" aria-hidden="true"></i> تغيير المعلومات</h1>
            </div>
            <div class="modal-body">

                <form class="form-horizontal" id="form_modify_debt" onsubmit="return false" method="post" action="">
                    <div class="form-group">
                        <label class="control-label col-sm-2" >الإسم
                        </label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control"  name="m_name" id="m_name"  value="none3">


                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >رقم الهاتف
                        </label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control"  name="m_tel" id="m_tel"  value="none3">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2">المبلغ</label>
                        <div class="col-sm-10" id="">
                            <input type="text" class="form-control"  name="m_amount" id="m_amount"  value="none3">

                        </div>
                    </div>




                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">أغلق</button>
                <button type="button"  onclick="submit_debt_form()" class="btn btn-info pull-right" data-dismiss="modal">حفظ التغييرات</button>

            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- Modal -->

<script type="text/javascript">

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
                        <button  class="btn btn-danger " id="delete_user" data-dismiss="modal">نعم</button>

                    </div>

                </div>

            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- Modal -->






<!-- Modal payed debt -->
<div class="modal fade" id="model_pay_debt" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header modal-header-info">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h1><i class="fa fa-pencil-square-o" aria-hidden="true"></i>دفع الديون</h1>
            </div>
            <div class="modal-body">

                <form class="form-horizontal" id="form_pay_debt" onsubmit="return false" method="post" action="">
                    <div class="form-group">
                        <label class="control-label col-sm-2" >تاريخ</label>
                        <div class="col-sm-10">
                            <div class="input-append input-group  date debt_date ">
                                <input class="form-control" size="16" type="text" value="" readonly id="p_m_date" name="p_m_date">
                                <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>

                            </div>

                        </div>


                    </div>


                    <div class="form-group">
                        <label class="control-label col-sm-2" >المبلغ</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control"  name="p_amount" id="p_amount"  oninput="this.value = this.value.replace(/[^0-9]/g, ''); this.value = this.value.replace(/(\..*)\./g, '$1');">


                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >الباقي</label>
                        <div class="col-sm-10">
                            <input  readonly type="text" class="form-control"  name="unpayed" id="unpayed"   value="none3">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-6">
                            <a class="c-btn c-datepicker-btn" onclick="calcul()">
                                <span class="material-icon">حساب</span>
                            </a>
                        </label>
                        <div class="col-sm-6" id="">
                                  <h2>
                                      النتائج :
                               <span class="label label-info" id="p_result">
0

                            </span>
                            </h2>

                        </div>
                    </div>




                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">أغلق</button>
                <button type="button"  onclick="submit_paydebt_form()" class="btn btn-info pull-right" data-dismiss="modal">حفظ التغييرات</button>

            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- Modal -->



<!-- incrise debt  -->
<div class="modal fade" id="model_incrise_debt" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header modal-header-info">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h1><i class="fa fa-pencil-square-o" aria-hidden="true"></i> زيادة الدين
                </h1>
            </div>
            <div class="modal-body">

                <form class="form-horizontal" id="form_increase_debt" onsubmit="return false" method="post" action="">
                    <div class="form-group">
                        <label class="control-label col-sm-2" >تاريخ</label>
                        <div class="col-sm-10">

                            <div class="input-append input-group  date debt_date ">
                                <input class="form-control" size="16" type="text" value="" readonly id="m_date" name="m_date">
                                <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>

                            </div>

                            <input type="hidden" id="mirror_fieldss" name="mirror_fieldss" value="" readonly /><br/>
                            <input type="hidden" id="to_debt" name="to_debt" value="" readonly /><br/>
                            <input type="hidden" id="payed_debt" name="payed_debt" value="" readonly /><br/>

                         <!--   <div class="form-group">
                                <div class="input-group date debt_date col-md-7" data-date="2017-02-21T05:25:07Z" data-date-format="dd MM yyyy - HH:ii p">
                                    <input class="form-control" size="16" type="text" value="" readonly>
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                                </div>
                                <input type="hidden" id="mirror_fieldss"  name="date_debt" value="" readonly /><br/>
                            </div>-->


                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2">السبب</label>
                        <div class="col-sm-10" id="">

                            <textarea  class="form-control" rows="5" id="m_comment" name="m_comment"></textarea>


                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >المبلغ</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control"  name="m_new_amount" id="m_new_amount"  >
                        </div>
                    </div>


                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">أغلق</button>
                <button type="button"  onclick="submit_increase_debt_form()" class="btn btn-info pull-right" data-dismiss="modal">حفظ </button>

            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<script type="text/javascript">
    $(".debt_date").datetimepicker({
        format: "dd MM yyyy - hh:ii",
        language:  'ar',
        linkField: "mirror_fieldss",
        linkFormat: "yyyy-mm-dd hh:ii"
    });
</script>

<!-- show history debt -->

<div class="modal fade" id="history" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header modal-header-info">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h1><i class="fa fa-pencil-square-o" aria-hidden="true"></i> أرشيف الديون
                </h1>
            </div>
            <div class="modal-body">

                <table class="table table-bordered" id="history_debt" cellspacing="0"  width="100%">
                    <thead>
                    <tr>
                        <th >تاريخ</th>
                        <th >السبب</th>
                        <th >المبلغ</th>
                        <th><i class="fa fa-cogs fa-align-center fa-2x " aria-hidden="true"></i></th>

                    </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">أغلق</button>

            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->



<!--  show history payed_debt -->

<div class="modal fade" id="history_payed_debt" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header modal-header-info">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h1><i class="fa fa-pencil-square-o" aria-hidden="true"></i> أرشيف الديون
                </h1>
            </div>
            <div class="modal-body">

                <table class="table table-bordered" id="history_debt_pay" cellspacing="0"  width="100%">
                    <thead>
                    <tr>
                        <th >تاريخ</th>
                        <th >المبلغ</th>

                    </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">أغلق</button>

            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<style>
.boled{
    font-weight: bold;
    font-size: 16px;}
</style>
</html>