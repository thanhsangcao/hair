<!DOCTYPE html>
<html class="no-js">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('siteTitle')</title>
    {{ Html::style('css/site.css') }}
    {{ Html::style('bower_components\bootstrap\dist\css\bootstrap.css') }}
    {{ Html::style('css\style.css') }}

</head>
<body>
	@include('navbar')
	{{ Html::script('bower_components/jquery/dist/jquery.min.js') }}
    {{ Html::script('bower_components\bootstrap\dist\js\bootstrap.js') }}

    @yield('content')
</body>
</html>
