
$(document).ready(function() {
$('.form_datetime').datetimepicker({
    format: "dd MM yyyy - hh:ii",
    language:  'ar',
    weekStart: 1,
    todayBtn:  0,
    autoclose: 1,
    todayHighlight: 1,
    startView: 2,
    forceParse: 0,
    showMeridian: 1,
    linkField: "mirror_field",
    linkFormat: "yyyy-mm-dd"

});
});
