
var id_prods =0;
var item=0;
var id_sl=0;
function delete_sale(id_pro,selected_item,idsales){

    id_prods=id_pro;
    item=selected_item;
    id_sl=idsales;
    $("#danger").modal("show");



}//end fun


$(document).ready(function() {

    $('#delete_sale').click(function(){
        $.ajax({
            type : 'POST',
            data: {'idpro':id_prods ,'selected_item':item,'idsale':id_sl},
            url : '/stock-app/Metier/Metier_delete_sale.php',

            success : function(data){
                console.log('submit success.');
                $("#info").modal("show");
            },
            error: function (data) {
                console.log('An error occurred.');
                console.log(data);
            }


        });

    });








});