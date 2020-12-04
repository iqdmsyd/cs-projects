$('select#dim_field').change(function(){
    var val1 = document.getElementById("dim_field").value;
    if (val1 == "-") {
        $('input#dim_submit').attr("disabled", true);
    }else {
        $('input#dim_submit').attr("disabled", false);
    }
});
