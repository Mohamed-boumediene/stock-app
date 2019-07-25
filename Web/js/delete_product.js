function delete_product(id_product) {


    $("#id_product_to_delete").val(id_product);

     $("#danger").modal('show');
     console.log("id input : "+$("#id_product_to_delete").val());


}




$("#delete_product").click(function(e){

    $("#delele_product_form").submit();
});


$("#delele_product_form").submit(function(e){
    e.preventDefault();
    $.ajax({
        type : 'POST',
        data: $("#delele_product_form").serialize(),
        url : '/stock-app/Metier/Metier_delete_product.php',

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
    $('body').load("/stock-app/Web/views/admin.php");

});

