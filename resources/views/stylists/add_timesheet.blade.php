@extends('master')
@section('title','Edit Timesheet')
@section('content')
<div class="container">
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
                    {!! Form::text('mon', '', ['class' => 'form-control', 'required' => 'required']) !!}
                </div>
                <div class="form-group" >
                    {!! Form::label('', __('Tuesday')) !!}
                    {!! Form::text('tues', '', ['class' => 'form-control', 'required' => 'required']) !!}
                </div>
                <div class="form-group" >
                    {!! Form::label('', __('Wednesday')) !!}
                    {!! Form::text('wed', '', ['class' => 'form-control', 'required' => 'required']) !!}
                </div>
                <div class="form-group" >
                    {!! Form::label('', __('Thursday')) !!}
                    {!! Form::text('thur', '', ['class' => 'form-control', 'required' => 'required']) !!}
                </div>
                <div class="form-group" >
                    {!! Form::label('', __('Friday')) !!}
                    {!! Form::text('fri', '', ['class' => 'form-control', 'required' => 'required']) !!}
                </div>
                <div class="form-group" >
                    {!! Form::label('', __('Saturday')) !!}
                    {!! Form::text('sat', '', ['class' => 'form-control', 'required' => 'required']) !!}
                </div>
                <div class="form-group" >
                    {!! Form::label('', __('Sunday')) !!}
                    {!! Form::text('sun', '', ['class' => 'form-control', 'required' => 'required']) !!}
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

