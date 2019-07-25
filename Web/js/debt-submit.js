
$(document).ready(function() {

    var test_select=0;
    var  type_debt="";

    $("#debt-sub").click(function(e){
        var check = true;


        if($("#name").val()==""){

            $("#name").css({"border-color":"#d9534f"});

            check = false;
        }else {
            $("#name").css({"border-color":"#5bc0de"});


        }
        if($("#tel").val()==""){

            $("#tel").css({"border-color":"#d9534f"});
            check = false;
        }else {
            $("#tel").css({"border-color":"#5bc0de"});


        }
        if($("#amount").val()==""){

            $("#amount").css({"border-color":"#d9534f"});
            check = false;
        }else {
            $("#amount").css({"border-color":"#5bc0de"});


        }
        if($("#reason").val()==""){

            $("#reason").css({"border-color":"#d9534f"});
            check = false;
        }else {
            $("#reason").css({"border-color":"#5bc0de"});


        }

        if( test_select == 0)
        { //
            check = false;// event handler doesn't exist }
        }else { //handler exists }
        }

        if(check == true){
            $("#form-debt").submit();
        }

        check = true;
    });



    $("#form-debt").submit(function(e){
        e.preventDefault();
        $.ajax({
            type : 'POST',
            data: $("#form-debt").serialize(),
            url : '/stock-app/Metier/Metier_add_debt.php?type_debt='+type_debt,

            success : function(data){
                console.log('submit success.');

                $("#info").modal("show");
                $("#name").val("");
                $("#tel").val("");
                $("#reason").val("");
                $("#amount").val("");


            },
            error: function (data) {
                console.log('An error occurred.');
                console.log(data);
            }


        });
        return false;
    });




    $("#ul-id li").click(function() {
        console.log("  real "+$(this).html());
        test_select=1;

            type_debt=$(this).html();

    });


});



$(document).ready(function() {
    $('#info').on('hidden.bs.modal', function () {

        console.log('hidden event fired!');
        //$("body").css("background-color","#eef1ea");
        // $('body').load("/stock-app/Web/views/admin.php");
        // $("body").css("background-color","#eef1ea");
        // $('body').load("/stock-app/Web/views/admin.php");
        // $("body").css("background-color","#607d8b");
        //$("body").css("background-color","#eef1ea");


        location.href="debt.php";


    });
});

