

$('#date_info_sale').datetimepicker({
    format: "yyyy-mm-dd ",
    language:  'ar',
    weekStart: 1,
    todayBtn:  0,
    autoclose: 1,
    todayHighlight: 1,
    startView: 2,
    forceParse: 0,
    showMeridian: 1,
    linkField: "mirror_field",
    linkFormat: "yyyy-mm-dd"

});
/*$(document).ready(function() {
    $('#date_info_sale').datepicker({

        // Days' name of the week.

        days: ["الأحد",
            "الاثنين",
            "الثلاثاء",
            "الأربعاء",
            "الخميس",
            "الجمعة",
            "السبت"],
// Shorter days' name

        daysShort: ["الأحد",
            "الاثنين",
            "الثلاثاء",
            "الأربعاء",
            "الخميس",
            "الجمعة",
            "السبت"],


// Shortest days' name

        daysMin: ["ح",
            "ن",
            "ث",
            "ر",
            "خ",
            "ج",
            "س"],


// Months' name

        months: ["يناير",
            "فبراير",
            "مارس",
            "أبريل",
            "مايو",
            "يونيو",
            "يوليو",
            "أغسطس",
            "سبتمبر",
            "أكتوبر",
            "نوفمبر",
            "ديسمبر"],


// Shorter months' name

        monthsShort: ["يناير",
            "فبراير",
            "مارس",
            "أبريل",
            "مايو",
            "يونيو",
            "يوليو",
            "أغسطس",
            "سبتمبر",
            "أكتوبر",
            "نوفمبر",
            "ديسمبر"]


    });
});*/

$('#date_info_sale')
    .datetimepicker()
    .on('changeDate', function(ev){
        console.log("change date");


        console.log("vla date :"+$("#mirror_field").val()) ;
        get_selected_day_sales($("#mirror_field").val());

    });


function get_selected_day_sales(date) {
    /*
    * date_of_sales	0
    * name_p 1
    * price_p 2
    * bying_p	 3
    * selected_item 4
    * new_p 5
    * total_benefit:  6
    plus_total_benefit: 7
    total_bying:  8
    * */
    var items=0;
    var total_purchase_price=0;
    var total_bying_price=0;
    var total_real_bying_price=0;
    var total_benefit_total=0;
    var total_plus_benefit=0;
    console.log("date in get_seletecd date is :"+date);
    sale_TB.rows().every(function (rowIdx, tableLoop, rowLoop) {
        //  var inm=saleTB.cell({row:rowIdx,column:4}).nodes().to$().find('input');
        var data = this.data();
        var date_only = data[0].split(" ");
        console.log(" current date  is :"+date_only[0]);

        if(date_only[0] == date){
            items = items +parseInt(data[4])  ;
            total_purchase_price = (total_purchase_price +  (parseInt(data[2])*  parseInt(data[4]))) ;
            total_bying_price = (total_bying_price+  (parseInt(data[3] )*  parseInt(data[4]))) ;
            if(data[5] == '0'){
                total_real_bying_price = (total_real_bying_price +  (parseInt(data[3] )*  parseInt(data[4]))) ;

            }else{
                total_real_bying_price = (total_real_bying_price +  (parseInt(data[5]) *  parseInt(data[4]))) ;
            }



        }


    });


    total_benefit_total = total_real_bying_price -total_purchase_price ;
    if(total_benefit_total< 0 ||total_benefit_total ==  0  ){
        total_plus_benefit = 0 ;


    }else{
        total_plus_benefit = total_bying_price - total_real_bying_price ;

    }
    if(total_plus_benefit <0){
        total_plus_benefit = total_plus_benefit * (-1);
    }



    $("#items").text(items);
    $("#total_purchase_price").text(total_purchase_price);
    $("#total_bying_price").text(total_bying_price);
    $("#total_real_bying_price").text(total_real_bying_price);
    $("#total_benefit_total").text(total_benefit_total);
    $("#total_plus_benefit").text(total_plus_benefit);

}