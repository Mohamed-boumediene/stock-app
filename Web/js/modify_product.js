
var id_product_to_modify = 0;

function modify_product(id_product,name_product,unite_price,bying_price,number_product){

    id_product_to_modify=id_product;

    var in_value1 = document.getElementById("up1");
    var in_value2 = document.getElementById("up2");
    var in_value3 = document.getElementById("up3");
    var in_value4 = document.getElementById("up4");
    in_value1.value=name_product;
    in_value2.value=unite_price;
    in_value3.value=bying_price;
    in_value4.value=number_product;

    console.log("id_product :"+id_product);


    $("#model_modify_product").modal("show");



}




$("#submit_update_product_form").click(function(e){

    $("#form_modify_product").submit();
});


$("#form_modify_product").submit(function(e){
    e.preventDefault();
    $.ajax({
        type : 'POST',
        data: $("#form_modify_product").serialize(),
        url : '/stock-app/Metier/Metier_modify_products.php?id_product_to_modify='+id_product_to_modify,

        success : function(data){
            console.log('submit success.');


            $("#info").modal("show");


        },
        error: function (data) {
            console.log('An error occurred.');
            console.log(data);
        }


    });
    return false;
});

$('#info').on('hidden.bs.modal', function () {

    console.log('hidden event fired!');
    //$("body").css("background-color","#eef1ea");
   // $('body').load("/stock-app/Web/views/admin.php");
   // $("body").css("background-color","#eef1ea");
   // $('body').load("/stock-app/Web/views/admin.php");
   // $("body").css("background-color","#607d8b");
    //$("body").css("background-color","#eef1ea");


location.href="admin.php";


});
