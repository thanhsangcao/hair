@extends('admin.master')
@section('title','Edit Timesheet')
@section('main')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <h2>{{ __('Time Sheet')}}</h2>
    {!! Form::open(['method' => 'post', 'enctype' => 'multipart/form-data']) !!}
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        <div class="row">
            <div class="col-xs-12">
                <div class="form-group" >
                    {!! Form::label('', __('Monday')) !!}
                    {!! Form::select('mon', ['yes' => 'yes', 'no' => 'no'], null,['class' => 'form-control']) !!}

                </div>
                <div class="form-group" >
                    {!! Form::label('', __('Tuesday')) !!}
                    {!! Form::select('tues', ['yes' => 'yes', 'no' => 'no'], null,['class' => 'form-control']) !!}
                </div>
                <div class="form-group" >
                    {!! Form::label('', __('Wednesday')) !!}
                    {!! Form::select('wed', ['yes' => 'yes', 'no' => 'no'], null,['class' => 'form-control']) !!}
                </div>
                <div class="form-group" >
                    {!! Form::label('', __('Thursday')) !!}
                    {!! Form::select('thur', ['yes' => 'yes', 'no' => 'no'], null,['class' => 'form-control']) !!}
                </div>
                <div class="form-group" >
                    {!! Form::label('', __('Friday')) !!}
                    {!! Form::select('fri', ['yes' => 'yes', 'no' => 'no'], null,['class' => 'form-control']) !!}
                </div>
                <div class="form-group" >
                    {!! Form::label('', __('Saturday')) !!}
                    {!! Form::select('sat', ['yes' => 'yes', 'no' => 'no'], null,['class' => 'form-control']) !!}
                </div>
                <div class="form-group" >
                    {!! Form::label('', __('Sunday')) !!}
                    {!! Form::select('sun', ['yes' => 'yes', 'no' => 'no'], null,['class' => 'form-control']) !!}
                </div>

                                    
                <div class="form-group" >
                    {!! Form::button('OK', ['type' => 'submit', 'class' => 'btn btn-primary', 'name' => 'submit']) !!}
                    <a href="{{ asset('stylists') }}" class="btn btn-danger">{{ __('Cancel') }}</a>
                </div>
            </div>
        </div>
        {!! Form::token() !!}
    {!! Form::close() !!}

    {{-- </div> --}}
</div>
@endsection

