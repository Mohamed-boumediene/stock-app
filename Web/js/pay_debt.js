
var id_debt=0;
var unpayed =0;

var Payed=0;

function pay_debt(id,payed,unpayed){


    $("#unpayed").val(unpayed);
    $("#p_result").text("0");
    $("#p_amount").val("");
    $("#p_m_date").val("");

    id_debt=id;
    Payed=payed;
    $("#model_pay_debt").modal("show");

}



function submit_paydebt_form() {


    $.ajax({
        type : 'POST',
        data: {'amount':$("#p_amount").val(),'id':id_debt,'unpayed':$("#unpayed").val(),'payed':Payed,'date':$("#p_m_date").val()},
        url : '/stock-app/Metier/Metier_pay_debt.php',

        success : function(data){
            console.log('submit success.');
            $("#info").modal("show");

        },
        error: function (data) {
            console.log('An error occurred.');
            console.log(data);
        }


    });



}

function calcul() {
var a =  $("#p_amount").val();

var b =  $("#unpayed").val();

    $("#p_result").text("0");
    unpayed =  b-a;


    $("#p_result").text(unpayed);


}