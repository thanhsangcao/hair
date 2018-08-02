@extends('admin.master')
@section('title','Edit RenderBooking')
@section('main')
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">{{ __('RenderBooking') }}</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-md-12 col-lg-6">  
                <div class="panel panel-primary">
                    <div class="panel-heading">{{ __('Edit RenderBooking') }}</div>
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
                                        {!! Form::label('', __('Day')) !!}
                                        {!! Form::text('day', $render_booking->day, ['class' => 'form-control', 'required' => 'required']) !!}
                                    </div>
                                    <div class="form-group" >
                                        {!! Form::label('', __('Time_start')) !!}
                                        {!! Form::text('time_start', $render_booking->time_start, ['class' => 'form-control', 'required' => 'required']) !!}
                                    </div>
                                    <div class="form-group" >
                                        {!! Form::label('', __('Status')) !!}
                                        {!! Form::text('status', $render_booking->status, ['class' => 'form-control', 'required' => 'required']) !!}
                                    </div>
                                    <div class="form-group" >
                                        {!! Form::label('', __('Salon_id')) !!}
                                        <select class="form-control" name="salon">
                                            @foreach($salon as $sl)
                                            <option
                                            @if($render_booking->salon_id == $sl->id)
                                                {{ "selected" }}
                                            @endif
                                            value="{{ $sl->id }}"> {{ $sl->name }} 
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group" >
                                        {!! Form::button('OK', ['type' => 'submit', 'class' => 'btn btn-primary', 'name' => 'submit']) !!}
                                        <a href="{{ route('renderbookings.index') }}" class="btn btn-danger">{{ __('Cancel') }}</a>
                                    </div>
                                </div>
                            </div>
                            {!! Form::token() !!}
                        {!! Form::close() !!}
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
