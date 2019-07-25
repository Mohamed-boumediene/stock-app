
var m_id=0;
function modify_consomation(amount , reason , date , id) {

$("#m_date").val(date);
$("#m_comment").val(reason);
$("#m_amount").val(amount);

m_id=id;
    $("#model_modify_con").modal("show");


}


function submit_con_form() {


    $.ajax({
        type : 'POST',
        data: $("#form_modify_con").serialize(),
        url : '/stock-app/Metier/Metier_modify_consomation.php?id='+m_id,

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

$(document).ready(function() {
    $('#info').on('hidden.bs.modal', function () {

        console.log('hidden event fired!');
        //$("body").css("background-color","#eef1ea");
        // $('body').load("/stock-app/Web/views/admin.php");
        // $("body").css("background-color","#eef1ea");
        // $('body').load("/stock-app/Web/views/admin.php");
        // $("body").css("background-color","#607d8b");
        //$("body").css("background-color","#eef1ea");


        location.href="consomation.php";


    });
});




