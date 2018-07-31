@extends('admin.master')
@section('title','Edit User')
@section('main')
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">{{ __('User') }}</h1>
            </div>
        </div><!--/.row-->
        
        <div class="row">
            <div class="col-xs-12 col-md-12 col-lg-12">
                
                <div class="panel panel-primary">
                    <div class="panel-heading">{{ __('Edit User') }}</div>
                    <div class="panel-body">
                        {!! Form::open(['method' => 'post', 'enctype' => 'multipart/form-data']) !!}
                            @foreach ($errors->all() as $error)
                                <p class="alert alert-danger">{{ $error }}</p>
                            @endforeach
                            
                            @if (session('status'))
                                <div class="alert alert-success">
                                    {{ session('status') }}
                                </div>
                            @endif
                            <div class="row">
                                <div class="col-xs-6">
                                    <div class="form-group" >
                                        {!! Form::label('', __('Name')) !!}
                                        {!! Form::text('name', $user->name, ['class' => 'form-control', 'required' => 'required']) !!}
                                    </div>

                                    <div class="form-group" >
                                        {!! Form::label('', __('Email')) !!}
                                        {!! Form::text('email', $user->email, ['class' => 'form-control', 'required' => 'required']) !!}
                                    </div>

                                    <div class="form-group" >
                                        {!! Form::label('', __('Password')) !!}
                                        {!! Form::password('password', ['class' => 'form-control', 'disabled' ]) !!}
                                    </div>

                                    <div class="form-group" >
                                        {!! Form::label('', __('Salon')) !!}
                                        {!! Form::select('salon_id', $select, $selectedSalon, ['class' => 'form-control']) !!}
                                    </div>

                                    <div class="form-group" >
                                        {!! Form::button('OK', ['type' => 'submit', 'class' => 'btn btn-primary', 'name' => 'submit']) !!}
                                        <a href="{{ asset('admin/users') }}" class="btn btn-danger">{{ __('Cancel') }}</a>
                                    </div>

                                    
                                </div>

                                <div class="col-xs-6">
                                    <div class="form-group" >
                                        {!! Form::label('', __('Phone Number')) !!}
                                        {!! Form::text('phone_number', $user->phone_number, ['class' => 'form-control', 'required' => 'required']) !!}
                                    </div>

                                    <div class="form-group" >
                                        {!! Form::label('', __('Address')) !!}
                                        {!! Form::text('address', $user->address, ['class' => 'form-control', 'required' => 'required']) !!}
                                    </div>

                                    <div class="form-group" >
                                        {!! Form::label('', __('Permission')) !!}
                                        {!! Form::text('permission', $user->permission, ['class' => 'form-control', 'required' => 'required']) !!}
                                    </div>
                                    
                                </div>
                            </div>
                            {!! Form::token() !!}
                        {!! Form::close() !!}
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div><!--/.row-->
    </div>  <!--/.main-->
@stop
