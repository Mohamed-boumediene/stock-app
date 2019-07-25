var history_debt_payed;
$(document).ready( function() {

        if (!$.fn.DataTable.isDataTable('#history_debt_pay')) {
            history_debt_payed = $('#history_debt_pay').DataTable({


                responsive: true,
                "language": {
                    "lengthMenu": 'أظهر' + ' <select  class="form-control input-sm" >' +
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
                "iDisplayLength": 2,
                "dom": "<'row'<'col-sm-6'l><'col-sm-6'f>>" + "<'row'<'col-sm-12'tr>>" + "<'row'<'col-sm-12'pi>>",

                "paging": true,
                "autoWidth": true
                /* "buttons": [
                     { // default PDF and customized PDF
                         extend: 'excelHtml5',
                         title: 'دين لي', // report header/title
                         text: 'حفظ\n' +
                         'دين لي ',
                         filename: 'حفظ\n' +
                         '__دين لي',
                         className: 'btn btn-info boled'


                     }

                 ]*/


            });



        }


    $('#history_payed_debt').on('shown.bs.modal', function (e) {

        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust()
            .responsive.recalc();


    });
});

var Id=0;
function show_history_payed(id) {
    Id=id;

    $.ajax({
        type : 'POST',
        data: {"id":id},
        url : '/stock-app/Metier/Metier_get_history_payed_debt.php',

        success : function(data){
            var array =JSON.parse(data);
            console.log(array);



            history_debt_payed.clear().draw();
            for (var i=0;i<array.length;i++){
                history_debt_payed.row.add([

                    ' <div class="row"> <div class="col-sm-12 ">\n' +
                    '\n' +
                    '                            <div class="   ">\n' +
                    '                                 <textarea  style="" class="form-control" rows="1" cols="42" value="'+array[i][0]+'" readonly id="p_h_date'+array[i][3]+'" name="p_h_date">'+array[i][0]+'</textarea>\n' +
                    '' +
                    '\n' +
                    '                            </div>\n' +
                    '\n' +
                    '                       \n' +
                    '\n' +
                    '                        </div> </div> ',
                    ' <div class="row"> <div class="col-sm-10" id="">\n' +
                    '\n' +
                    '                            <textarea  class="form-control" rows="1" cols="42" id="p_h_reason'+array[i][1]+'" readonly name="p_h_reason"" value="'+array[i][1]+'">'+array[i][1]+'</textarea>\n' +
                    '\n' +
                    '\n' +
                    '                        </div> </div>'



                ]).draw(false);

            }

            $("#history_payed_debt").modal("show");

        },
        error: function (data) {
            console.log('An error occurred.');
            console.log(data);
        }


    });

}



/*
function  allow_modify(id) {
    $("#h_reason"+id).attr("readonly", false);
    $("#h_amount"+id).attr("readonly", false);
    $("#h_date"+id).attr("readonly", false);
    $(".h_allow_m").datetimepicker({
        format: "dd MM yyyy - hh:ii",
        language:  'ar',
        linkField: "mirror_fieldss",
        linkFormat: "yyyy-mm-dd hh:ii"
    });

    // $("#h_date"+id).addClass('h_allow_m');

}

function  up_m(id) {


    $.ajax({
        type : 'POST',
        data: {"id":id,"reason":$("#h_reason"+id).val(),"date":$("#h_date"+id).val(),"amount":$("#h_amount"+id).val()},
        url : '/stock-app/Metier/Metier_modify_single_history.php',

        success : function(data){
            $("#history").modal("hide");
            $("#info").modal("show");
        },
        error: function (data) {
            console.log('An error occurred.');
            console.log(data);
        }


    });}
*/
