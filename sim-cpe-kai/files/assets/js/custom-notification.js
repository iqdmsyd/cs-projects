function notify(message, type){
    $.growl({
        message: message
    },{
        type: type,
        allow_dismiss: true,
        label: 'Cancel',
        className: 'btn-xs btn-inverse',
        placement: {
            from: 'top',
            align: 'center'
        },
        // delay: 2500,
        animate: {
                enter: 'animated fadeInDown',
                exit: 'animated fadeOutRight'
        },
        offset: {
            x: 30,
            y: 30
        }
    });
};
