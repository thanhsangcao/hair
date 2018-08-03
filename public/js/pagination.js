$(document).ready(function(e) {
    $('.pagination li a').click(function() {
        
        var page = $(this).attr('href').split('page=')[1];
        
        $.get('users?page=' + page, function(data){
            $('body').html(data);
        }); 
        return false;
    });
});
