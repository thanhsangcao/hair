<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register</title>

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
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>
                <div class="panel-body">
                    <!-- <form role="form" method="post"> -->
                    @foreach ($errors->all() as $error)
                        <p class="alert alert-danger">{{ $error }}</p>
                    @endforeach

                    {!! Form::open(['method' => 'post']) !!}
                        <fieldset>
                            <div class="form-group">
                                {!! Form::text('name', '', ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'Name' ]) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::email('email', '', ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'Email Address' ]) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::text('mobile', '', ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'Mobile' ]) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::password('password', ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'Password' ]) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::password('password_confirmation', ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'Confirm Password' ]) !!}
                            </div>
                            {!! Form::button('OK', ['type' => 'submit', 'class' => 'btn btn-primary', 'name' => 'submit']) !!}
                            <a href="{{ route('login')}}" class="btn btn-default">Back</a>
                        </fieldset>
                        {!! Form::token() !!}
                    {!! Form::close() !!}
                    <!-- </form> -->
                </div>
            </div>
        </div><!-- /.col-->
    </div><!-- /.row -->     
</body>

</html>
