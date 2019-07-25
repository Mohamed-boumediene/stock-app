 function  sale_change_total() {
     var total = 0;
    var incr=1;
    saleTB.rows().every(function (rowIdx, tableLoop, rowLoop) {
        var data = this.data();
        var inm=saleTB.cell({row:rowIdx,column:4}).nodes().to$().find('input');
        var  id_in= parseInt(inm.attr('id'))-200;


        console.log("id_input  --------------"+id_in);
        console.log("incr  : "+incr);
        console.log("name_p  : "+data[0]);
        console.log("price_p : "+data[1]);
        console.log("bying_p   : "+data[2]);
        console.log("selected item:   "+$('#select'+id_in).find(":selected").attr('value'));

        console.log("prodect_number"+$('#select'+id_in).find('option').last().text());
        console.log( "new price  : "+$('#'+(id_in+200)).val());
        //incr++;
        console.log("-------------END----------------");


        var isDisabled = $('#'+(id_in+200)).is(':disabled');
        if(isDisabled){

            console.log(" is disable");

            console.log(" total before new_P "+$('#total_pro span').html());


            var seld=$('#select'+id_in).find(":selected").attr('value');
            console.log("total selected item  before parse :"+seld);
            total= total +(parseInt(data[2])*parseInt(seld));
            console.log("total selected item after parse  :"+seld);

            console.log("total  byin_p :"+parseInt(data[2]));
            console.log("total  after new _P :"+total);
            $('#total_pro span').html(total+" آوقية ");
            console.log("total :"+total);


        }


        else {

            console.log(" is enable");

            console.log(" total before new_P "+$('#total_pro span').html());
            if($('#'+(id_in+200)).val() == ""){
                console.log("input empty ----------------");
                $('#'+(id_in+200)).val(data[2]);
            }

            var seld=$('#select'+id_in).find(":selected").attr('value');
            console.log("total selected item  before parse :"+seld);
            total= total +($('#'+(id_in+200)).val()*parseInt(seld));
            console.log("total selected item after parse  :"+seld);

            console.log("total  byin_p :"+parseInt(data[2]));
            console.log("total  after new _P :"+total);
            $('#total_pro span').html(total+" آوقية ");
            console.log("total :"+total);


        }



incr++;

    });
     total = 0;
    // $("#total_pro").attr('disabled', 'disabled');
    incr=1;


}