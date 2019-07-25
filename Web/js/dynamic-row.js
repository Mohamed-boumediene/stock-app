
var i=1;
function add_new_item() {

    if($('#count').val()=="after_submit"){
        console.log("count after : "+$('#count').val());
        i=1;
        $('#count').val("0");

    }

    var tr ='  <tr>' +
        '                                                       <td >' +
        '                                                           <div class="form-group">\n' +
        '                                                               <div class="col-xs-12">\n' +
        '                                                                   <input type="email" class="form-control" id="product-numbers'+i+'"  name="product-numbers'+i+'"  placeholder=" أدخل أعداد">\n' +
        '                                                               </div>\n' +
        '                                                           </div>\n' +
        '                                                       </td>\n' +
        '                                                       <td>\n' +
        '                                                           <div class="form-group">\n' +
        '                                                               <div class="col-xs-12">\n' +
        '                                                                   <input type="email" class="form-control" id="product-buying-price'+i+'" name="product-buying-price'+i+'" placeholder=" أدخل سعر البيع الفرد">\n' +
        '                                                               </div>\n' +
        '                                                           </div>\n' +
        '                                                       </td>\n' +
        '                                                       <td>\n' +
        '                                                           <div class="form-group">\n' +
        '                                                               <div class="col-xs-12">\n' +
        '                                                                   <input type="email" class="form-control" id="product-unite-price'+i+'" name="product-unite-price'+i+'" placeholder="أدخل سعر الفرد ">\n' +
        '                                                               </div>\n' +
        '                                                           </div>\n' +
        '                                                       </td>\n' +
        '                                                       <td>\n' +
        '                                                           <div class="form-group">\n' +
        '                                                               <div class="col-xs-12">\n' +
        '                                                                   <input type="email" class="form-control" id="product-name'+i+'"  name="product-name'+i+'" placeholder="أدخل إسم المنتج">\n' +
        '                                                               </div>\n' +
        '                                                           </div>\n' +
        '                                                       </td>\n' +
        '                                                       <td>\n' +
        '                                                           <div class="form-group">\n' +
        '                                                               <div class="col-xs-8">\n' +
        '                                                                   <button class="btn btn-danger   glyphicon glyphicon-remove " onclick="deleteRow($(this))" ></button>\n' +
        '\n' +
        '                                                               </div>\n' +
        '                                                           </div>\n' +
        '                                                       </td>\n' +
        '                                                   </tr> ';




   // document.getElementById('#count').value=i;
    if($('#count').val()!="after_submit") {
        $('#mytable tr:last').after(tr);
        console.log("count  before or after  after : "+$('#count').val());
        $('#count').val(i);
        console.log("i="+i+"   input ="+$('#count').val());
        i=i+1;

    }

}



/* delete tr dynamic */
function deleteRow(row) {

    row.closest('tr').remove();

}