$(document).ready(function(e) {
    $('#form_booking').validate({
        rules: {
            phone_number:{
                digits: true,
                rangelength: [10, 11]
            }
        },
        messages: {
            phone_number:'Please enter the correct phone number'
        }
    });
});