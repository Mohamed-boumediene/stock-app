var state = "off";
function toggle_btn(btn,input) {

    var isDisabled = $("#"+input).is(':disabled');
    if(isDisabled){

        console.log(" is off");
        $("#"+input).removeAttr('disabled');


        //state="on";
    }


    else {

        console.log(" is on");
        $("#"+input).attr('disabled', 'disabled');
        $("#"+input).val("");
        //state="off";
    }

}//toggle btn




//saleTB.rows().every(function (rowIdx, tableLoop, rowLoop) { console.log(saleTB.cell({row:rowIdx,column:4}).nodes().to$().find('input').val());
//});