var Id_debt=0;
function open_to_increase_debt(id_debt,payed,amount) {
    Id_debt= id_debt;


    $("#m_date").val("");
    $("#m_comment").val("");
    $("#m_new_amount").val("");
    $("#model_incrise_debt").modal("show");

    $("#to_debt").val(amount);
    $("#payed_debt").val(payed);


}

function submit_increase_debt_form() {


    $.ajax({
        type : 'POST',
        data: $("#form_increase_debt").serialize(),
        url : '/stock-app/Metier/Metier_increase_debt.php?id='+Id_debt,

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