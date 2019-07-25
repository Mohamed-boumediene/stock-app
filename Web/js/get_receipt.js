function printreceipt(receiptname){



    $.ajax({
        type : 'POST',
        data:  {receipt:receiptname },
        url : '/stock-app/Metier/Metier_get_receipt.php',

        success : function(data){
            console.log('submit success.');



            var array = JSON.parse(data);
      var stotal=0;
for (var i=0;i<array.length;i++){
    $("#shop_name").text(array[i][5]);
    $("#shop_phone").text(array[i][4]);
    $("#id_date").text(array[i][3]);
       var content="<tr style=\"border: 5px solid #000;\">\n" +
           "                                <td class=\"col-md-9\" style=\"border: 5px solid #000;\"> <h3>"+array[i][0]+" </h3></td>\n" +
           "                                <td class=\"col-md-3\" style=\"border: 5px solid #000;\"> <h3>"+array[i][2]+"  X "+array[i][1]+" </h3></td>\n" +
           "                            </tr>";
stotal=stotal+(parseInt(array[i][2])*parseInt(array[i][1]));
    $('#tb-print tr:last').after(content);

// alert(data);

}
var total=" <tr>\n" +
    "\n" +
    "                            <td class=\"text-right\"><h2><strong>مجموع : </strong></h2></td>\n" +
    "                            <td class=\"text-left text-danger\"><h2><strong> "+stotal+"</strong></h2></td>\n" +
    "                        </tr>";
            $('#tb-print tr:last').after(total);

            get_receipt();
        },
        error: function (data) {
            console.log('An error occurred.');
            console.log(data);
        }


    });

}

function get_receipt() {
var restorepage = document.body.innerHTML;
    document.body.innerHTML = document.getElementById("id_receipt").innerHTML;
    $("body").hide();
    $("body").show();
    window.print();
    $("body").hide();
    $("body").show();
    document.body.innerHTML = restorepage;
    location.reload();


  /*  window.frames["print_frame"].document.body.innerHTML = document.getElementById("id_receipt").innerHTML;
    window.frames["print_frame"].window.focus();
    window.frames["print_frame"].window.print();*/

/*
  var DocumentContainer = document.getElementById('id_receipt');
    //document.body.innerHTML = document.querySelector("#id_receipt").innerHTML;
    var Window = window.open('', 'PrintWindow', 'width=350,height=350,top=50,left=50,toolbars=no,scrollbars=yes,status=no,resizable=yes');
    var strHtml = "<html>\n<head>\n <link rel=\"stylesheet\" type=\"text/css\" href=\"test.css\">\n</head><body> gfgggggggggggg<div style=\"testStyle\">\n"+

        +"\n</div>\n</body>\n</html>";
    Window.document.write(strHtml);
    Window.document.close();
   Window.focus();
    Window.print();
   Window.close();*/



}
