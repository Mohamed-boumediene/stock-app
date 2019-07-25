

var con_TB ="";
$(function() {
    $("#loading").fadeOut(500, function() {
        $("#wrapper").fadeIn(1000);
      //  $("body").css("background-color","#2f3c4b");
        if (!$.fn.DataTable.isDataTable('#display_debt')) {
            con_TB = $('#display_debt').DataTable({


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
                "dom": "<'row'<'col-sm-3'B><'col-sm-3'l><'col-sm-6'f>>" + "<'row'<'col-sm-12'tr>>" + "<'row'<'col-sm-12'pi>>",

                "paging": true,
                "autoWidth": true,
                "buttons": [
                    { // default PDF and customized PDF
                        extend: 'excelHtml5',
                        title: 'دين علي', // report header/title
                        text: 'حفظ\n' +
                        'دين علي ',
                        filename: 'حفظ\n' +
                        '__دين علي',
                        className:'btn btn-info boled'


                    }

                ]


            });

            var value=0;
            con_TB.columns(4).each(function () {
                var data = this.data();
                var tb = data[0];
                for(var i=0 ; i<tb.length;i++){
                    console.log("iteration  " +i+"  data   "+ tb[i]);
                    value=value+parseInt(tb[i]);
                }
                console.log("data " + data[0]);
                console.log("value " + value);
            });
            $("#totl_debt1").text(value);
        }
    });
});


$(document).ready( function() {



});


$(document).ready( function() {
    setTimeout(function () {
        if (!$.fn.DataTable.isDataTable('#display_debt2')) {
            debt2_TB = $('#display_debt2').DataTable({


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
                "dom": "<'row'<'col-sm-3'B><'col-sm-3'l><'col-sm-6'f>>" + "<'row'<'col-sm-12'tr>>" + "<'row'<'col-sm-12'pi>>",

                "paging": true,
                "autoWidth": true,
                "buttons": [
                    { // default PDF and customized PDF
                        extend: 'excelHtml5',
                        title: 'دين لي', // report header/title
                        text: 'حفظ\n' +
                        'دين لي ',
                        filename: 'حفظ\n' +
                        '__دين لي',
                        className:'btn btn-info boled'


                    }

                ]


            });
            var value=0;
            debt2_TB.columns(4).each(function () {
                var data = this.data();
                var tb = data[0];
                for(var i=0 ; i<tb.length;i++){
                    console.log("iteration  " +i+"  data   "+ tb[i]);
                    value=value+parseInt(tb[i]);
                }
                console.log("data " + data[0]);
                console.log("value " + value);
            });
            $("#totl_debt2").text(value);

        }
    }, 700);
});