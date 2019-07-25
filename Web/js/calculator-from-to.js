function get_result() {
    var check = true;
   var datefrom = $("#datefrom").val();
   var dateto = $("#dateto").val();

    if($("#datefrom").val()==""){

        $("#datefrom").css({"border-color":"#d9534f"});
        check = false;
        console.log("is impty");
    }else {
        $("#datefrom").css({"border-color":"#5bc0de"});
        console.log("is not  impty");

    } if($("#dateto").val()==""){

        $("#dateto").css({"border-color":"#d9534f"});
        check = false;
        console.log("is impty");
    }else {
        $("#dateto").css({"border-color":"#5bc0de"});
        console.log("is not  impty");

    }

    if(check == true){
        console.log("is true");
        console.log("datefrom"+datefrom);
        console.log("dateto"+dateto);
        $.ajax({
            type : 'POST',
            data: {'datefrom':datefrom,'dateto':dateto},
            url : '/stock-app/Metier/Metier_get_information.php',

            success : function(data){
             var tb=   [];
             var tb=   data.split(',');



                console.log('submit success.');


               // $("#info").modal("show");


                for(var i=0; i< tb.length;i++){
                    console.log("loop"+i);
                    if(i==0 ){
                        var b=tb[i].split('[');
                        tb[i]=b[1];
                    }
                    if(i==tb.length -1){
                        var b=tb[i].split(']');
                        tb[i]=b[0];
                    }
                    $("#"+i).text("0");
                    $("#"+i).text(tb[i]);
                  console.log( tb[i]);

                }
            },
            error: function (data) {
                console.log('An error occurred.');
                console.log(data);
            }


        });

    }
    check = true;


}