function notify(message, type){
    $.growl({
        message: message
    },{
        type: type,
        allow_dismiss: false,
        label: 'Cancel',
        className: 'btn-xs btn-inverse',
        placement: {
            from: 'top',
            align: 'center'
        },
        // delay: 2500,
        animate: {
            enter: 'animated fadeInDown',
            // exit: 'animated fadeOutRight'
        },
        offset: {
            x: 30,
            y: 30
        }
    });
};

$('input#files_field').change(function(){
    var files = this.files;
    if(files.length > 10){
        alert("Sorry.\nYou can select max 10 files.");
        $('input#import_submit').attr("disabled", true);
    }else{
        // alert("correct, you have selected less than 10 files");
        $('input#import_submit').attr("disabled", false);
    }
});
