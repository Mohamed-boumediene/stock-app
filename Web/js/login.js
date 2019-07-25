

function login(){
var test = 0 ;

$('form input').each(function() {
    var $this = $(this);

    if (!$this.val()) {
        test = 1 ;
        var inputid = $this.attr('id');

        var el = document.getElementById(inputid);
        el.style.borderBottom="1px solid #e80000";

        $("#alert").html("input empty ");
        $("#alert").show();
        console.log("empty");
return false ;
    }else{

        var inputid = $this.attr('id');

        var el = document.getElementById(inputid);
        el.style.borderBottom="1px solid rgb(114, 208, 236)";
        console.log("full");
        $("#alert").hide();


    }
});

if(test == 0){
    console.log("call sub");
    submit();
}
test=0;
}




function submit(){

    console.log("insode sub");

    $.ajax({
        type : 'POST',
        data: $("#login-form").serialize(),
        url : '/stock-app/Metier/Metier_login.php',
        success : function(data){
            console.log('submit success.');
            console.log(data);

          if( data == 1){
              location.href="admin.php";

          }else{
              $("#alert").html("");
              $("#alert").html("error in user/pass ");
              $("#alert").show();

               }
        },
        error: function (data) {
            console.log('An error occurred.');
            console.log(data);
        }


    });

}
