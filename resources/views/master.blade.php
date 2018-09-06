<!DOCTYPE html>
<html>
<head>
    <title> @yield('title') </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name = "csrf-token" content="{{ csrf_token() }}"/>
    
    {{ Html::style('https://fonts.googleapis.com/css?family=Roboto:300,400,700') }}
    {{ Html::style('bower_components/bower-hair/frontend/css/bootstrap.css') }}
    {{ Html::style('bower_components/bower-hair/frontend/css/animate.css') }}
    {{ Html::style('bower_components/bower-hair/frontend/css/owl.carousel.min.css') }}
    {{ Html::style('bower_components/bower-hair/frontend/css/magnific-popup.css') }}
    {{ Html::style('bower_components/bower-hair/frontend/fonts/ionicons/css/ionicons.min.css') }}
    {{ Html::style('bower_components/bower-hair/frontend/fonts/fontawesome/css/font-awesome.min.css') }}
    {{ Html::style('bower_components/bower-hair/frontend/fonts/flaticon/font/flaticon.css') }}
    {{ Html::style('css/style.css') }}
    {{ Html::style('bower_components/bower-hair/booking/css/fonts-icons.css') }}
    {{ Html::style('bower_components/bower-hair/booking/css/material-bootstrap-wizard.css') }}


</head>
<body>
@include('navbar')
    
@yield('content')

@include('footer')
</body>
    {{ Html::script('bower_components/bower-hair/frontend/js/jquery-3.2.1.min.js') }}
    {{ Html::script('bower_components/bower-hair/frontend/js/jquery-migrate-3.0.0.js') }}
    {{ Html::script('bower_components/bower-hair/frontend/js/popper.min.js') }}
    {{ Html::script('bower_components/bower-hair/frontend/js/bootstrap.min.js') }}
    {{ Html::script('bower_components/bower-hair/frontend/js/owl.carousel.min.js') }}
    {{ Html::script('bower_components/bower-hair/frontend/js/jquery.waypoints.min.js') }}
    {{ Html::script('bower_components/bower-hair/frontend/js/jquery.stellar.min.js') }}
    {{ Html::script('bower_components/bower-hair/frontend/js/jquery.magnific-popup.min.js') }}
    {{ Html::script('bower_components/bower-hair/frontend/js/magnific-popup-options.js') }}
    {{ Html::script('bower_components/bower-hair/frontend/js/main.js') }}
    {{ Html::script('js/pagination.js') }}
    {{ Html::script('js/validate.js') }}
    {{ Html::script('bower_components/bower-hair/booking/js/jquery.bootstrap.js') }}
    {{ Html::script('bower_components/bower-hair/booking/js/material-bootstrap-wizard.js') }}
    {{ Html::script('bower_components/bower-hair/booking/js/jquery.validate.min.js') }}

</html>
