$(document).ready(function(e) {
    //Paginate Ajax
    $('body').on('click', '.pagination a', function(e) {
        e.preventDefault();

        var url = $(this).attr('href');  
        getArticles(url);
        window.history.pushState("", "", url);
    });

    function getArticles(url) {
        $.ajax({
            url : url  
        }).done(function (data) {
            $('.bootstrap-table').html(data);  
        });
    }

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    //Get Stylist Ajax
    $('#salon_id').on('change', function (e) {
        $('.timesheet').empty();
        var salon_id = this.value;
        $.ajax({
            type : 'post',
            url : 'getStylist',
            data : { salon_id : salon_id },
            dataType : 'json',
            success : function(data) {
                $('.stylist').html(data.html); 
            }

        });
    });

    //Get TimeSheetStylist Ajax
    $('#stylist_id').on('change', function (e) {
        $('.timesheet').empty();
        var stylist_id = this.value;
        $.ajax({
            type : 'post',
            url : 'getTimesheet',
            data : { stylist_id : stylist_id },
            dataType : 'json',
            success : function(data) {
                $('.timesheet').html(data.html); 
            }
        });
    });

    $('.del').on('click', function () {
        return confirm('Are u sure?');
    });

    $('#myModal').on('hidden.bs.modal', function () {
        location.reload(true);
    });
    
    //Save service in booking
    $('.btn-service').on('click', function(e){
        var service_id = this.value;
        $.ajax({
            type : 'post',
            url : 'addService',
            data : { service_id : service_id},
            dataType : 'json',
            success : function(data){
                $('.btn-service[value=' + service_id + ']').html('Added ');
                $('.btn-service[value=' + service_id + ']').removeClass('btn-primary').addClass('btn').attr('disabled', 'disabled');
            }
        });
    });

    /*$('.status-button[data-booking]').click(function(e){
        let booking = $(this).data('booking');
        let status = $(this).data('status');
        let getUrl = '/admin/bookings/' + booking + '/status/' + status;
        $.get(getUrl, function(data) {
            if (data == 1) {
                let keepSpan = $('.btn[data-booking=' + booking + ']>span').clone();
                if (status == 2) {
                    $('.btn[data-booking=' + booking + ']').html('Confirmed ').append(keepSpan);
                    $('.btn[data-booking=' + booking + ']').removeClass('btn-info').addClass('btn-primary');
                    $('#confirm').attr('data-status','3');
                    $('#confirm').html('Complete');
                } else if (status == 3) {
                    $('.btn[data-booking=' + booking + ']').html('Completed ').append(keepSpan);
                    $('.btn[data-booking=' + booking + ']').removeClass('btn-primary').addClass('btn-success');
                } else if (status == 4) {
                    $('.btn[data-booking=' + booking + ']').html('Canceled ').append(keepSpan);
                    $('.btn[data-booking=' + booking + ']').removeAttr('class').attr('class', 'btn dropdown-toggle');
                } else if (status == 1) {
                    $('.btn[data-booking=' + booking + ']').html('New ').append(keepSpan);
                    $('.btn[data-booking=' + booking + ']').removeAttr('class').attr('class', 'btn btn-info dropdown-toggle');
                }
            }
        });
    });*/

    /*$(document).on('click', '.status-button[data-booking]', function(e){
        let booking = $(this).data('booking');
        let status = $(this).data('status');
        let getUrl = '/admin/bookings/' + booking + '/status/' + status;
        $.get(getUrl, function(data) {
            $('#'+booking).html(data.html);
            $(document).on('click', '#btn-close', function(e){
                e.preventDefault();
                $('#myModal').modal('hide');
            });
        });
    });*/

    //Select box
    /*$('#selectcontrol').MultiColumnSelect({
        menuclass : 'mcs',
        openmenuClass : 'mcs-open',
        openmenuText : 'Choose an Option...',
        containerClass : 'mcs-container',
        itemClass : 'mcs-item',
        duration : 200,
        onOpen: function() {
            // some action
        },
        onClose: function() {
            // some action
        },
        onItemSelect: function() {
            // some action

        }
    });*/


});
