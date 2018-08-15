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

    //Select box
    $('#selectcontrol').MultiColumnSelect({
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
    });


});
