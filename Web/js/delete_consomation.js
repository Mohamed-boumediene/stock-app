var d_id =0;
function delete_consomation(id) {
    $("#danger").modal("show");
d_id=id;

}

$(document).ready(function () {

    $("#delete_con").click(function () {

        $.ajax({
            type : 'POST',
            data: {id:d_id},
            url : '/stock-app/Metier/Metier_delete_consomation.php',

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
