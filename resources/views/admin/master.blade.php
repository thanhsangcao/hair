<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    {{ Html::style('bower_components/bower-hair/css/bootstrap.min.css') }}
    {{ Html::style('bower_components/bower-hair/css/datepicker3.css') }}
    {{ Html::style('css/styles_admin.css') }}
    {{ Html::script('bower_components/bower-hair/js/lumino.glyphs.js') }}
    {{ Html::style('css\style.css') }}
    {{ Html::script('bower_components/bower-hair/js/jquery-1.11.1.min.js') }}
    {{ Html::script('js/pagination.js') }}
</head>
<body>
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="{{ asset('admin') }}">{{ __('Hair Salon Manager') }}</a>
                <ul class="user-menu">
                    <li class="dropdown pull-right">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> Hello {{ Auth::user()->name }}  <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{ asset('admin/logout') }}"><svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg> {{ __('Logout') }}</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
                            
        </div><!-- /.container-fluid -->
    </nav>
        
    <div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
        <ul class="nav menu">
            <li role="presentation" class="divider"></li>
            <li class="active"><a href="{{ asset('admin') }}"><svg class="glyph stroked dashboard-dial"><use xlink:href="#stroked-dashboard-dial"></use></svg> {{ __('Homepage') }}</a></li>
            @if (Auth::check())
                @role('admin')
                    <li><a href="{{ asset('admin/users') }}"><svg class="glyph stroked male user"><use xlink:href="#stroked-male-user"></use></svg> {{ __('User') }}</a></li>
                    <li><a href="{{ asset('admin/salons') }}"><svg class="glyph stroked home"><use xlink:href="#stroked-home"/></svg>{{ __('Salon') }}</a></li>
                    <li><a href="{{ asset('admin/services') }}"><svg class="glyph stroked star"><use xlink:href="#stroked-star"/></svg>{{ __('Service') }}</a></li>
                    <li><a href="{{ asset('admin/renderbookings') }}"><svg class="glyph stroked calendar"><use xlink:href="#stroked-calendar"/></svg>{{ __('RenderBooking') }}</a></li>
                    <li><a href="{{ asset('admin/manage_stylists') }}"><svg class="glyph stroked clock"><use xlink:href="#stroked-clock"/></svg>{{ __('Stylists') }}</a></li>
                    <li><a href="{{ asset('admin/bookings') }}"><svg class="glyph stroked clipboard with paper"><use xlink:href="#stroked-clipboard-with-paper"/></svg>{{ __('Bookings') }}</a>
                    </li>
                @endrole
            @endif
            @if (Auth::check())
                @role('stylist')
                <li><a href="{{ asset('admin/stylists') }}"> {{ __('Profile') }}</a></li>
                @endrole
            @endif
            <li role="presentation" class="divider"></li>
        </ul>
        
    </div><!--/.sidebar-->
    @yield('main')
    
    {{ Html::script('bower_components/bower-hair/js/bootstrap.min.js') }}
    {{ Html::script('bower_components/bower-hair/js/chart.min.js') }}
    {{ Html::script('bower_components/bower-hair/js/chart-data.js') }}
    {{ Html::script('bower_components/bower-hair/js/easypiechart.js') }}
    {{ Html::script('bower_components/bower-hair/js/easypiechart-data.js') }}
    {{ Html::script('bower_components/bower-hair/js/bootstrap-datepicker.js') }}
    {{ Html::script('bower_components/bower-hair/js/myscript.js') }}

    <script>
        $('#calendar').datepicker({
        });

        !function ($) {
            $(document).on("click","ul.nav li.parent > a > span.icon", function(){          
                $(this).find('em:first').toggleClass("glyphicon-minus");      
            }); 
            $(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
        }(window.jQuery);

        $(window).on('resize', function () {
          if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
        })
        $(window).on('resize', function () {
          if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
        })
    </script>   
</body>

</html>
