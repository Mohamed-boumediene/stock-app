


    $("#form-sub").click(function(e){
        //alert("this");
        var valid = 1;
        console.log("valid    "+valid);

        $('form input').each(function() {
            var $this = $(this);

            if(!$this.val()){

                var inputid = $this.attr('id');

                valid = 0;


                var el=document.getElementById(inputid);
                console.log("before border-color   inputid= "+inputid+" "+$(el).val());
                el.style.borderColor= "#d9534f" ;


                console.log("valid  inside !this.val() -  inputid= "+inputid+" "+$(el).val());

            }
            if($this.val()){
                var inputid = $this.attr('id');
                var el=document.getElementById(inputid);
                el.style.borderColor="#5bc0de" ;
                console.log("valid  inside this.val()  + inputid="+inputid+"  "+$(el).val());
            }
        });

        if(valid === 0) {

            $("#warning").modal('show');
            console.log("warning    "+valid);


        }else{
            /* copy input value to other */



            if($('input[name="real-date-cmd-creation"]').val()){

                var inputid = $('input[name="real-date-cmd-creation"]').attr('id');
                var el=document.getElementById(inputid);
                el.style.borderColor="#5bc0de" ;
                console.log("valid  inside !this.val()  + inputid="+inputid+"  "+$(el).val());

                console.log("before ----> "+$('input[name="product-date-creation0"]').val());

                var inpu =  $('input[name="real-date-cmd-creation"]').val();
                $('input[name="product-date-creation0"]').val(inpu);
                console.log("after  ----> "+$('input[name="product-date-creation0"]').val());
               // $("#myfrm").preventDefault();
                $("#myfrm").submit();
             //  $("#info").modal('show');
                console.log("submit section  "+valid);


            }else{
                $("#warning").modal('show');
                console.log("warning   for real-date-creation  "+valid);

                var inputid = $('input[name="real-date-cmd-creation"]').attr('id');
                var el=document.getElementById(inputid);
                el.style.borderColor="#d9534f" ;
                console.log("valid  inside !this.val()  + inputid="+inputid+"  "+$(el).val());

            }




        }

});


    $("#myfrm").submit(function(e){
        e.preventDefault();
        $.ajax({
            type : 'POST',
            data: $("#myfrm").serialize(),
            url : '/stock-app/Metier/Metier_new_cmd.php',
           // url : '/stock-app/Metier/test_file.php',

            success : function(data){
                console.log('submit success.');
                $("#info").modal("show");
                //$("#mytable").find("tr:not(:first)").remove();
               // $("#mytable > tbody:last").children().remove();
               // $('#mytable tr:not(:first)').remove();
                $("#mytable tr:gt(1)").remove();



                $('form input').each(function() {
                    var $this = $(this);
                    if($this.val()){
                        var inputid = $this.attr('id');
                        var el=document.getElementById(inputid);
                        el.value="";

                    }
                });

                //document.getElementById("#cmd-date").value="";
                $("input[type=date]").val("");
                $('#product-date-creation0').val("inputdate");
                $('#count').val("after_submit");
                console.log("count :"+$('#count').val());
            },
            error: function (data) {
                console.log('An error occurred.');
                console.log(data);
            },


        });
        return false;
    });



