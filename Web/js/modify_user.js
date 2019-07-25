
var id_user=0;
function modify_user(name,pass,role,id) {


    $("#m_name").val(name);
    $("#m_pass").val(pass);
   var select = $("#m_role");
    select.empty();
   if(role == "admin"){

       var option ;
       option = $('<option  selected>مدير</option>');
       option.attr('value','مدير' );
       option.text('مدير');
       select.append(option);

       option = $('<option  >المستخدم</option>');
       option.attr('value',"المستخدم" );
       option.text("المستخدم");
       select.append(option);



   }else{
       var option ;
       option = $('<option  >مدير</option>');
       option.attr('value','مدير' );
       option.text('مدير');
       select.append(option);

       option = $('<option selected >المستخدم</option>');
       option.attr('value',"المستخدم" );
       option.text("المستخدم");
       select.append(option);

   }


    id_user=id;
    $("#model_modify_user").modal("show");



}



function submit_user_form() {


    $.ajax({
        type : 'POST',
        data: $("#form_modify_user").serialize(),
        url : '/stock-app/Metier/Metier_modify_user.php?id='+id_user,

        success : function(data){
            console.log('submit success.');
            $("#info").modal("show");
            console.log(id_user);
            console.log($("#m_name").val());
            console.log($("#m_pass").val());
            console.log($('#m_role option:selected').text());

            console.log(id_user);
        },
        error: function (data) {
            console.log('An error occurred.');
            console.log(data);
        }


    });



}