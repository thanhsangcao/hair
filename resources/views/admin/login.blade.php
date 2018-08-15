<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>

    {{ Html::style('bower_components/bower-hair/admin/css/bootstrap.min.css') }}
    {{ Html::style('bower_components/bower-hair/admin/css/datepicker3.css') }}
    {{ Html::style('css/styles_admin.css') }}
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->

</head>

<body>
    
    <div class="row">
        <div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-default">
                <div class="panel-heading">{{ __('Login') }}</div>
                <div class="panel-body">
                    <!-- <form role="form" method="post"> -->
                    @foreach ($errors->all() as $error)
                        <p class="alert alert-danger">{{ $error }}</p>
                    @endforeach

                    {!! Form::open(['method' => 'post']) !!}
                        <fieldset>
                            <div class="form-group">
                                {!! Form::email('email', '', ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'Email' ]) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::password('password', ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'Password' ]) !!}
                            </div>
                            <div class="checkbox">
                                <label>
                                    {!! Form::checkbox('remember', 'remember') !!}
                                    {{ __('Remember Me') }}
                                </label>
                            </div>
                            {!! Form::button('Login', ['type' => 'submit', 'class' => 'btn btn-primary', 'name' => 'submit']) !!}
                        </fieldset>
                        {!! Form::token() !!}
                    {!! Form::close() !!}
                    <!-- </form> -->
                </div>
            </div>
        </div><!-- /.col-->
    </div><!-- /.row -->    
    {{ Html::script('bower_components/bower-hair/admin/js/jquery-1.11.1.min.js') }}
    {{ Html::script('bower_components/bower-hair/admin/js/bootstrap.min.js') }}
    {{ Html::script('bower_components/bower-hair/admin/js/js/chart.min.js') }}
    {{ Html::script('bower_components/bower-hair/admin/js/chart-data.js') }}
    {{ Html::script('bower_components/bower-hair/admin/js/easypiechart.js') }}
    {{ Html::script('bower_components/bower-hair/admin/js/easypiechart-data.js') }}
    {{ Html::script('bower_components/bower-hair/admin/js/bootstrap-datepicker.js') }}
        
    <script>
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
