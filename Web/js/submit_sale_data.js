$('#sale_btn').on( 'click', function () {
var incr=1;
var rq=1;
    saleTB.rows().every(function (rowIdx, tableLoop, rowLoop) {
        var data = this.data();
//-------------------DATA-------------------------------
        console.log("DATA : "+data);
//------------------DATA------------------------------
        var inm=saleTB.cell({row:rowIdx,column:4}).nodes().to$().find('input');
        var  id_in= parseInt(inm.attr('id'))-200;
        console.log("incr  : "+id_in);
        console.log("name_p  : "+data[0]);
        console.log("price_p : "+data[1]);
        console.log("bying_p   : "+data[2]);
        console.log("selected item:   "+$('#select'+id_in+' option:selected').val());
        console.log("prodect_number"+$('#select'+id_in).find('option').last().text());
        console.log( "new price  : "+$('#'+(id_in+200)).val());
        console.log( "id_product : "+data[5]);
        console.log( "date  : "+$('#mirror_field').val());
        console.log( "user   : "+$('#user_did_it').val());

        console.log("-------------END----------------");

        $.ajax({
            type : 'POST',
            data:  { name_p : data[0],price_p : data[1],bying_p : data[2],
                selected_item : $('#select'+id_in+' option:selected').val(),
                total_item : $('#select'+id_in).find('option').last().text(),
                new_p : $('#'+(id_in+200)).val(),id_p : data[5],date_operation : $('#mirror_field').val(),'user':$('#user_did_it').val(),first:rq},
            url : '/stock-app/Metier/Metier_add_new_sale.php',

            success : function(data){
                console.log('submit success.');


                $("#info").modal("show");


            },
            error: function (data) {
                console.log('An error occurred.');
                console.log(data);
            }


        });

rq=rq+1;












/*

*
* radicale
* nombre reel
* calcul literale
* valeur absole
*
*
* reflextion & refraction
* entile converjante diverjante
*
* */






    });


} );