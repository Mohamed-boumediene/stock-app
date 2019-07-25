
$(document).ready(function() {




    $("#con-sub").click(function(e){
    var check = true;


    if($("#amounts").val()==""){

        $("#amounts").css({"border-color":"#d9534f"});
        check = false;
    }else {
        $("#amounts").css({"border-color":"#5bc0de"});


    }

//-------------------------------------------------

    if($("#comment").val()==""){
        $("#comment").css({"border-color":"#d9534f"});
        check = false;


    }else {
        $("#comment").css({"border-color":"#5bc0de"});

    }

//-------------------------------------------------
    if($("#time").val()==""){
        $("#time").css({"border-color":"#d9534f"});

        check = false;

    }else {
        $("#time").css({"border-color":"#5bc0de"});

    }

    if(check == true){
        $("#form-consumation").submit();
    }

    check = true;
});



$("#form-consumation").submit(function(e){
    e.preventDefault();
    $.ajax({
        type : 'POST',
        data: $("#form-consumation").serialize(),
        url : '/stock-app/Metier/Metier_add_new_consomation.php?user='+$("#user").text(),
        // url : '/stock-app/Metier/test_file.php',

        success : function(data){
            console.log('submit success.');

            $("#info").modal("show");
            $("#amounts").val("");
            $("#comment").val("");
            $("#time").val("");

        },
        error: function (data) {
            console.log('An error occurred.');
            console.log(data);
        }


    });
    return false;
});


});
