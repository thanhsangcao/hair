@extends('admin.master')
@section('title','Add new salon')
@section('main')
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">{{__('Salon')}}</h1>
            </div>
        </div><!--/.row-->
        
        <div class="row">
            <div class="col-xs-12 col-md-12 col-lg-6">
                
                <div class="panel panel-primary">
                    <div class="panel-heading">{{__('Create a new Salon')}}</div>
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
                                        {!! Form::label('','Name') !!}
                                        <input required type="text" name="name" class="form-control">
                                    </div>
                                    <div class="form-group" >
                                        {!! Form::label('','Address') !!}
                                        <input required type="text" name="address" class="form-control">
                                    </div>
                                    
                                    <div class="form-group" >
                                    <input type="submit" name="submit" class=" btn btn-primary" value="OK">
                                    <a href="{{asset('admin/salons')}}" class="btn btn-danger">{{__('Cancel')}}</a>
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