
$(document).ready(function() {

var test_select=0;
var role="";

    $("#user-sub").click(function(e){
        var check = true;


        if($("#name").val()==""){

            $("#name").css({"border-color":"#d9534f"});
            check = false;
        }else {
            $("#name").css({"border-color":"#5bc0de"});


        }
        if($("#pass").val()==""){

            $("#pass").css({"border-color":"#d9534f"});
            check = false;
        }else {
            $("#pass").css({"border-color":"#5bc0de"});


        }

        if( test_select == 0)
            { //
                check = false;// event handler doesn't exist }
            }else { //handler exists }
        }

        if(check == true){
            $("#form-user").submit();
        }

        check = true;
    });



    $("#form-user").submit(function(e){
        e.preventDefault();
        $.ajax({
            type : 'POST',
            data: $("#form-user").serialize(),
            url : '/stock-app/Metier/Metier_add_user.php?role='+role,

            success : function(data){
                console.log('submit success.');

                $("#info").modal("show");
                $("#name").val("");
                $("#pass").val("");


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
        if($(this).html() == "مدير"){
          role="admin";
            console.log("  role "+role);
        }else if ($(this).html() == "المستخدم"){
            role="users";
            console.log("  role "+role);
        }
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


        location.href="users.php";


    });
});

