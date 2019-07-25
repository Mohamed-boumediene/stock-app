

var sale_TB ="";
$(function() {
    $("#loading").fadeOut(500, function() {
        $("#wrapper").fadeIn(1000);
        //$("body").css("background-color","#2f3c4b");
        if (!$.fn.DataTable.isDataTable('#display_sale')) {
            sale_TB = $('#display_sale').DataTable({
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
                        title: ' المبيعات', // report header/title
                        text: 'حفظ\n' +
                        ' المبيعات ',
                        filename: 'حفظ\n' +
                        '__ المبيعات',
                        className:'btn btn-info boled'


                    }

                ]


            });
          var t =  sale_TB.row(':first').data();
         var first= t[0].split(" ");
         console.log("first "+first[0]);
           $("#in_put_date").val(first[0]);
           // $('#date_info_sale').datetimepicker('setStartDate', first[0]);
            var e =  sale_TB.row(':last').data();
            var last= e[0].split(" ");
           // $('#date_info_sale').datetimepicker('setEndDate', last[0]);
          console.log("last "+last[0]);
           // $('#date_info_sale').datetimepicker('update');
            get_selected_day_sales(first[0]);

        }
    });
});


$(document).ready( function() {



});


