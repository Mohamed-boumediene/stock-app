
var id_pro_to_modify = 0;
var selected_items = 0;
var total_items = 0;
var pr_p = 0;
var by_p = 0;
var ids = 0;




function modify_sale(date_of_sales,id_prodcut,selected_item,new_p,price_p,bying_p,id){

ids=id;
    id_pro_to_modify=id_prodcut;
    selected_items=selected_item;
    pr_p=price_p;
    by_p=bying_p;

    var in_value1 = document.getElementById("up1");
    var in_value4 = document.getElementById("mirror_fieldss");

    var in_value3 = document.getElementById("up3");
    in_value1.value=date_of_sales;
    in_value4.value=date_of_sales;
    $("#add_select").empty();
    in_value3.value=new_p;

    $.ajax({
        type : 'POST',
        data: {'id':id_prodcut},
        url : '/stock-app/Metier/Metier_get_total_item.php',

        success : function(data){
            console.log('submit success.');

              console.log(data);
            var select = $('<select   class="form-control input-sm ww" name="up2" id="select_item"></select>');
            items=parseInt(data);
           total_items=items;
           if(items == '0'){
               var option ;
               option = $('<option  selected></option>');
               option.attr('value', selected_item);
               option.text(selected_item);
               select.append(option);
           }else{
               for(i=1;i<=items;i++){
                   var option ;
                   if(i==selected_item){
                       option = $('<option  selected></option>');
                   }else{
                       option = $('<option></option>');
                   }

                   option.attr('value', i);
                   option.text(i);
                   select.append(option);

               }

            }

            var jelm = $(select);//convert to jQuery Element
            var htmlElm = jelm[0]//convert to HTML Element
            $("#add_select").append(htmlElm.outerHTML);


            $("#model_modify_sale").modal("show");
        },
        error: function (data) {
            console.log('An error occurred.');
            console.log(data);
        }


    });


}//end fun





function submit_sale_form(){
console.log("clicked to submit ");
    begin_submit();
}


function begin_submit(){
    console.log("begin to submit ");

    $.ajax({
        type : 'POST',
        data: $("#form_modify_sale").serialize(),
        url : '/stock-app/Metier/Metier_modify_sale.php?id_sale_to_modify='+id_pro_to_modify+'&selected_item='+selected_items+'&total_items='+total_items+'&price_p='+pr_p+'&bying_p='+by_p+'&ids='+ids,

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
};
$(document).ready(function() {
$('#info').on('hidden.bs.modal', function () {

    console.log('hidden event fired!');
    //$("body").css("background-color","#eef1ea");
    // $('body').load("/stock-app/Web/views/admin.php");
    // $("body").css("background-color","#eef1ea");
    // $('body').load("/stock-app/Web/views/admin.php");
    // $("body").css("background-color","#607d8b");
    //$("body").css("background-color","#eef1ea");


    location.href="sales.php";


});
});





