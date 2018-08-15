@extends('sites.master')
@section('siteTitle', __('Order_Booking'))
@section('content')
<div class="container">
    <div class="content-step">
        <div id="infor_user">
            <div class="price-box to-animate info-group-form">
                {{ Form::Open(['method' => 'POST', 'enctype' => 'multipart/form-data']) }}
                    @foreach ($errors -> all() as $error)
                        <p class="alert alert-danger">{{ $error }}</p>
                    @endforeach
                        {!! csrf_field() !!}
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    {{ Form::label('', null, ['class' => 'text-success form-name']) }}
                        <h4>
                            {{ trans('booking.input') }}
                        </h4>
                            <div class="form-group">
                                {!! Form::label('', __('Name')) !!}
                                {{ Form::text('name', '', ['class' => 'name-input form-control input-lg', 'placeholder' => trans('booking.name'), 'required' => 'required']) }}
                            </div>
                            <div class="form-group">
                                {!! Form::label('', __('Phone')) !!}
                                {{ Form::text('phone_number', '', ['class' => 'phone-input form-control input-lg', 'placeholder' => trans('booking.phone'), 'required' => 'required']) }}
                            </div>
                                {!! Form::submit(trans('booking.next'), ['type' => 'submit', 'class' => 'btn btn-primary', 'name' => 'submit']) !!}
                {{ Form::close() }}
            </div>
        </div>
    </div>
</div>
@endsection
