
var v=false;
var con_TB ="";
$(function() {
    $("#loading").fadeOut(500, function() {
        $("#wrapper").fadeIn(1000);
       // $("body").css("background-color","rgb(3,169,244)");
        if (!$.fn.DataTable.isDataTable('#display_con')) {
            v=true;
            con_TB = $('#display_con').DataTable({

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
                        title: 'كل إستهلاك', // report header/title
                        text: 'حفظ\n' +
                        'كل إستهلاك',
                        filename: 'حفظ\n' +
                        '__كل إستهلاك',
                        className:'btn btn-info boled'


                    }

                ]


            });


        }


            var value=0;
            con_TB.columns(0).each(function () {
                var data = this.data();
          var tb = data[0];
      for(var i=0 ; i<tb.length;i++){
          console.log("iteration  " +i+"  data   "+ tb[i]);
          value=value+parseInt(tb[i]);
      }
                console.log("data " + data[0]);
                console.log("value " + value);
            });
        $("#totl_cons").text(value);


    });
});


$(document).ready( function() {

        console.log("ff");


});


