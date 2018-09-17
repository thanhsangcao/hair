@extends('admin.master')
@section('title','Edit Service')
@section('main')
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">{{ __('Service') }}</h1>
            </div>
        </div><!--/.row-->
        
        <div class="row">
            <div class="col-xs-12 col-md-12 col-lg-6">
                
                <div class="panel panel-primary">
                    <div class="panel-heading">{{ __('Edit Service') }}</div>
                    <div class="panel-body">
                        {!! Form::open(['method' => 'post', 'enctype' => 'multipart/form-data']) !!}
                            @if (session('status'))
                                <div class="alert alert-success">
                                    {{ session('status') }}
                                </div>
                            @endif
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="form-group" >
                                        {!! Form::label('', __('Name')) !!}
                                        {!! Form::text('name', $service->name, ['class' => 'form-control', 'required' => 'required']) !!}
                                    </div>
                                    <div class="form-group" >
                                        {!! Form::label('', __('Price')) !!}
                                        {!! Form::text('price', $service->price, ['class' => 'form-control', 'required' => 'required']) !!}
                                    </div>
                                    <div class="form-group" >
                                        {!! Form::label('', __('Description')) !!}
                                        {!! Form::textarea('description', $service->description, ['class' => 'form-control', 'required' => 'required']) !!}
                                    </div>
                                    <div class="form-group" >
                                        {!! Form::label('', __('Image')) !!}
                                        {!! Form::file('image', ['id' => 'img', 'onchange' => 'changeImg(this)']) !!}
                                        <img id="avatar" class="thumbnail" width="300px" src="{{ asset('images/' . $service->img) }}">
                                    </div>
                                    
                                    <div class="form-group" >
                                        {!! Form::button('OK', ['type' => 'submit', 'class' => 'btn btn-primary', 'name' => 'submit']) !!}
                                        <a href="{{ asset('admin/services') }}" class="btn btn-danger">{{ __('Cancel') }}</a>
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
