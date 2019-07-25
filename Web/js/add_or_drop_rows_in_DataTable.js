var stockTB="" ;
var saleTB="";
var ii=1;
var index_row="none";
var id_btn=1;
var tb=[];
var tbi=0;

var aa=false;

var a=[[]];
var j ;

$(document).ready( function() {


    setTimeout(function () {
        if (!$.fn.DataTable.isDataTable('#dataTables-sale')) {


            var us=$("#userrole").text();
            if(us.trim() == "مشرف"){
                saleTB = $('#dataTables-sale').DataTable({
                    "columnDefs": [
                        { "aTargets": [5], "sClass": "invisible"}// here is the tricky part
                    ]                ,
                    responsive: true,
                    "autoWidth": false,
                    "bFilter": false,
                    "bJQueryUI": true,
                    'iDisplayLength': 1000,
                    'bLengthChange': false,
                    "language": {

                        "paginate": {
                            "next": "❯",
                            "previous": "❮"


                        },
                        "search": "ابحث",
                        "zeroRecords": "لم يعثر على أية سجلات",
                        "emptyTable": "لا تتوفر بيانات في الجدول\n",
                        "info": "إظهار _START_ إلى _END_ من أصل _TOTAL_ مدخل",
                        "sInfoFiltered": "منتقاة من مجموع _MAX_ مُدخل",
                        "sInfoEmpty": "يعرض 0 إلى 0 من أصل 0 سجل"
                    }
                });
            }else{
                saleTB = $('#dataTables-sale').DataTable({
                    "columnDefs": [
                        { "aTargets": [5,1], "sClass": "invisible"}// here is the tricky part
                    ]                ,
                    responsive: true,
                    "autoWidth": false,
                    "bFilter": false,
                    "bJQueryUI": true,
                    'iDisplayLength': 1000,
                    'bLengthChange': false,
                    "language": {

                        "paginate": {
                            "next": "❯",
                            "previous": "❮"


                        },
                        "search": "ابحث",
                        "zeroRecords": "لم يعثر على أية سجلات",
                        "emptyTable": "لا تتوفر بيانات في الجدول\n",
                        "info": "إظهار _START_ إلى _END_ من أصل _TOTAL_ مدخل",
                        "sInfoFiltered": "منتقاة من مجموع _MAX_ مُدخل",
                        "sInfoEmpty": "يعرض 0 إلى 0 من أصل 0 سجل"
                    }
                });

            }
            //saleTB.columns(5).visible( false );
            //saleTB.width("100%");
            saleTB.columns.adjust().draw(); // adjust column sizing and redraw
        }


    }, 2000);

    setTimeout(function () {
        if (!$.fn.DataTable.isDataTable('#mytable')) {

             $('#mytable').DataTable({
                responsive: true,
                 "bPaginate": false,
                 "bFilter": false,
                 "bInfo": false

            });

        }
    },3000);
});

$(function() {
    $("body").css("background-color","#eef1ea");
    $("#loading").fadeOut(500, function() {
        // $("body").css("background-color","#eef1ea");
        $("#wrapper").fadeIn(1000);
        if (!$.fn.DataTable.isDataTable('#dataTables-example')) {
            // var hCols = [0, 8,9];
            stockTB = $('#dataTables-example').DataTable({
                // "sCharSet": "utf-8",

                responsive: true,
                "language": {
                    "lengthMenu": 'أظهر'+' <select  class="form-control input-sm" >' +
                    '<option selected="selected"   value="3">3</option>' +
                    '<option selected="selected" value="10">10</option>' +
                    '<option value="20">20</option>' +
                    '<option value="30">30</option>' +
                    '<option value="40">40</option>' +
                    '<option value="50">50</option>' +
                    '<option value="-1">All</option>' +
                    '</select> مدخلات',
                    "paginate": {
                        "next": "❯",
                        "previous": "❮"


                    },
                    "search": "ابحث",
                    "zeroRecords": "لم يعثر على أية سجلات",
                    "emptyTable": "لا تتوفر بيانات في الجدول\n",
                    "info": "إظهار _START_ إلى _END_ من أصل _TOTAL_ مدخل",
                    "sInfoFiltered": "منتقاة من مجموع _MAX_ مُدخل",
                    "sInfoEmpty": "يعرض 0 إلى 0 من أصل 0 سجل"
                },
                "bSort": false,
                "iDisplayLength": 3,
                "dom": "<'row'<'col-sm-4'B><'col-sm-2'l><'col-sm-6'f>>" + "<'row'<'col-sm-12'tr>>" + "<'row'<'col-sm-12'pi>>",

                "paging": true,
                "autoWidth": true,
                "buttons": [
                    { // default PDF and customized PDF
                        extend: 'excelHtml5',
                        title: 'المخزون', // report header/title
                        text: 'حفظ\n' +
                        'المخزون ',
                        filename: 'حفظ\n' +
                        '__المخزون',
                        className:'btn btn-info boled'


                    }

                ]


            });

        }



    });
});
$(document).ready( function() {
    //table











    $('table.colorchange input[type=checkbox]').click(
        function () {
            $(this).closest('tr').toggleClass("info", this.checked);

            if (!this.checked) {
                var data = $(this).val();
                var tb = data.split(',');
                var incr=1;
                console.log("is  NOT checked : " + $(this).val());
                var totals = 0;
                saleTB.rows().every(function (rowIdx, tableLoop, rowLoop) {
                    var datas = this.data();


                    if (datas[5] == tb[4]) {

                        //------------caculate -------------------//

                        var inm=saleTB.cell({row:rowIdx,column:4}).nodes().to$().find('input');
                        var  id_in= parseInt(inm.attr('id'))-200;

                        console.log("incr  : "+incr);
                        console.log("name_p  : "+datas[0]);
                        console.log("price_p : "+datas[1]);
                        console.log("bying_p   : "+datas[2]);
                        console.log("selected item:   "+$('#select'+id_in).find(":selected").attr('value'));

                        console.log("prodect_number"+$('#select'+id_in).find('option').last().text());
                        console.log( "new price  : "+$('#'+(id_in+200)).val());
                        //incr++;
                        console.log("-------------END----------------");


                        var isDisabled = $('#'+(id_in+200)).is(':disabled');
                        if(isDisabled){

                            console.log(" is disable");
                            console.log('datas[5] :' + datas[5]+"     tb[4]  :"+tb[4] +" incr : "+incr);

                            console.log(" total before new_P "+$('#total_pro span').html());
                            console.log(" total before operation "+totals);

                            var  string_total=$('#total_pro span').html();
                            var total_int=string_total.split('آوقية');
                            totals=parseInt(total_int);
                            console.log("total_int "+total_int);
                            var seld=$('#select'+id_in).find(":selected").attr('value');
                            console.log("total selected item  before parse :"+seld);
                            var resultat = (parseInt(datas[2])*parseInt(seld));
                            console.log("result befor op   :"+resultat);

                            console.log("totale befor op  :"+totals);

                            if( resultat > totals){ totals =  resultat - totals ;}else if( resultat < totals){totals = totals -  resultat; }else{totals=0;}
                            //totals= totals -  resultat;
                            // totals = totals * (-1);
                            console.log("total selected item after parse  :"+seld);

                            console.log("total  byin_p :"+parseInt(datas[2]));
                            console.log("total  after new _P :"+totals);
                            $('#total_pro span').html(totals+" آوقية ");
                            console.log("total :"+totals);


                        }else {

                            console.log(" is enable");
                            if($('#'+(id_in+200)).val() == ""){
                                console.log("input empty ----------------");
                                $('#'+(id_in+200)).val(datas[2]);
                            }
                            console.log(" total before new_P "+$('#total_pro span').html());

                            var  string_total=$('#total_pro span').html();
                            var total_int=string_total.split('آوقية');
                            totals=parseInt(total_int);
                            console.log("total_int "+totals);
                            var seld=$('#select'+id_in).find(":selected").attr('value');
                            console.log("total selected item  before parse :"+seld);
                            var resultat = (parseInt($('#'+(id_in+200)).val())*parseInt(seld));
                            if( resultat > totals){ totals =  resultat - totals ;}else if( resultat < totals){totals = totals -  resultat; }else{totals=0;}

                            console.log("total selected item after parse  :"+seld);

                            console.log("input val   byin_p :"+parseInt($('#'+(id_in+200)).val()));
                            console.log("total  after new _P :"+totals);
                            $('#total_pro span').html(totals+" آوقية ");
                            console.log("total :"+totals);

                            //console.log('datas[5] :' + datas[5]+"     tb[4]  :"+tb[4] +" incr : "+incr);

                        }




                        //-----------end calculate ---------------//

                        console.log("index_row value before : "+index_row);
                        index_row=rowIdx;
                        console.log("index_row value after  :"+index_row);


                    } else {
                        // i=1;
                        console.log("is not index to delete ");
                    }
                    incr++;
                    // ... do something with data(), or this.node(), etc
                });
                incr=1;

                if(index_row != "none"){
                    console.log("index_row is   :"+index_row);
                    saleTB.row(index_row)
                        .remove()
                        .draw();
                    index_row="none";

                }else{
                    console.log("index_row is null :"+index_row );
                }
                // saleTB.draw();
            } else {
                console.log("is checked :" + $(this).val());
                var data = $(this).val();
                var tb = data.split(',');
                console.log("data :"+data);

                if (!$.fn.DataTable.isDataTable('#dataTables-sale')) {
                    saleTB = $('#dataTables-sale').DataTable({

                        responsive: true,
                        "autoWidth": false,
                        "bFilter": false,"bLengthChange": false

                    });


                }
                saleTB.rows().every(function (rowIdx, tableLoop, rowLoop) {
                    var data_sale = this.data();

                    //var after_split=data.split(',');
                    if (data_sale[5] == tb[4]) {
                        ii = 0;
                        console.log('data_sale[5] :' + data_sale[5]+"     tb[4]  :"+tb[4] +" i : "+i);
                        console.log("exit recored !");
                    }else{
                        // i=1;
                        console.log("new  recored !");
                        console.log('data_sale[5] :' + data_sale[5]+"     tb[4]  :"+tb[4] +" i : "+i);

                    }
                    // ... do something with data(), or this.node(), etc
                });
                //  var row = $('#MyDataTable').dataTable().fnGetNodes(rowIndex);
                // $(row).attr( 'id', 'MyUniqueID' );

                if (ii == 1) {


                    console.log('new row  added');
                    console.log('id_btn'+id_btn);
                    // console.log('data[5] :' + data_sale[5]+"     tb[4]  :"+tb[4] +" i : "+i);


                    console.log(" total second "+$('#total_pro span').html());
                    var total =$('#total_pro span').html();

                    var e= total.split('آوقية');
                    total=parseInt(e[0]);
                    total= total +(tb[2]*1);
                    $('#total_pro span').html(total+" آوقية ");

                    console.log(" e "+e[0]);
                    console.log("total :"+total);



                    var select = $('<select   class="form-control input-sm ww"  id="select'+id_btn+'"></select>');

                    for(i=1;i<=tb[3];i++){
                        var option ;
                        if(i==1){
                            option = $('<option ></option>');
                        }else{
                            option = $('<option></option>');
                        }

                        option.attr('value', i);
                        option.text(i);
                        select.append(option);

                    }
                    var jelm = $(select);//convert to jQuery Element
                    var htmlElm = jelm[0]//convert to HTML Element

                    saleTB.row.add([

                        /* '<div class="form-group"> ' +
                         '<input class="form-control col-sm-12" type=text value="'+tb[0]+'" />' +
                         '</div>',*/
                        tb[0],
                        tb[1],
                        tb[2],
                        htmlElm.outerHTML ,

                        '<button type="button" id="'+id_btn+'" onclick="toggle_btn('+id_btn+','+(id_btn+200)+')" class="btn btn-lg btn-toggle " data-toggle="button" aria-pressed="false" autocomplete="off">'+
                        '<div class="handle"></div>'+
                        '</button>'+

                        '<div class="form-group"> ' +

                        '<input class="form-control col-sm-12 as"  id="'+(id_btn+200)+'" type=text placeholder="اكتب السعر الجديد"  oninput="this.value = this.value.replace(/[^0-9]/g, \'\'); this.value = this.value.replace(/(\\..*)\\./g, \'$1\');" disabled/>' +
                        ' </div> '
                        ,tb[4]



                    ]).draw(false);
                    //  return false;
                    id_btn++;
                } else {
                    console.log('already exist cannot be added');
                }
                // do your cool stuff
                ii=1;
            }


        });

    $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust()
            .responsive.recalc();
    });









} );




