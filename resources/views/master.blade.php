<!DOCTYPE html>
<html>
<head>
    <title> @yield('title') </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name = "csrf-token" content="{{ csrf_token() }}"/>
    {{ Html::style('bower_components/bootstrap/dist/css/bootstrap.css') }}
    {{ Html::style('css/style.css') }}
    {{ Html::style('bower_components/bower-hair/Multi-Column-Select/Multi-Column-Select.css') }}
    <!--     Fonts and icons     -->
    {{ Html::style('bower_components/bower-hair/booking/css/fonts-icons.css') }}
    {{ Html::style('bower_components/bower-hair/booking/css/font-awesome.min.css') }}

    <!-- CSS Files -->
    {{ Html::style('bower_components/bower-hair/booking/css/bootstrap.min.css') }}
    {{ Html::style('bower_components/bower-hair/booking/css/material-bootstrap-wizard.css') }}
    

</head>
<body>
@include('navbar')
    
    
@yield('content')
</body>
    {{ Html::script('bower_components/bower-hair/booking/js/jquery-2.2.4.min.js') }}
    {{ Html::script('js/pagination.js') }}
    {{ Html::script('bower_components/bower-hair/booking/js/bootstrap.min.js') }}
    {{ Html::script('bower_components/bower-hair/booking/js/jquery.bootstrap.js') }}
    {{ Html::script('bower_components/bower-hair/booking/js/material-bootstrap-wizard.js') }}
    {{ Html::script('bower_components/bower-hair/booking/js/jquery.validate.min.js') }}
    {{ Html::script('bower_components/bower-hair/Multi-Column-Select/Multi-Column-Select.js') }}
</html>
