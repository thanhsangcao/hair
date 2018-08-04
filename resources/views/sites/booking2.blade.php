@extends('sites.master')
@section('siteTitle', __('Booking2'))
@section('content')
    <div class="container">
        <div class="content-step2">
            <div class="col-md-12 col-sm-12 col-xs-12 choice_address" id="choice_list_time">
                <div class="price-box to-animate">
                    <div class="row">
                        <div class="wrap-stylist-choice col-md-5 col-sm-12 row1">
                            <label class="text-success form-name">
                                <h4>
                                    <i class="fa fa-map-marker" aria-hidden="true"></i>
                                        {{ trans('booking.stylist') }}
                                </h4>
                            </label>
                            <div class="form-group">
                                <select class="form-control input-lg">
                                </select>
                            </div>
                        </div>
                        <div class="wrap-booking-time col-md-7 col-sm-12 col-xs-12 row2">
                            <label class="text-success form-name">
                                <h4>
                                    <i class="fa fa-user" aria-hidden="true"></i>
                                        {{ __('Choose Time') }}
                                </h4>
                            </label>
                            <div class="form-group">
                                <select class="form-control input-lg">
                                </select>
                            </div>
                        {{ Form::Open(['method' => 'POST', 'enctype' => 'multipart/form-data']) }}
                            @if (session('status'))
                                <div class="alert alert-success">
                                    {{ session('status') }}
                                </div>
                            @endif
                            <div class="form-group">
                            <a href="{{ asset('/booking') }}" class="btn btn-danger">{{ __('Prev') }}</a>
                            {!! Form::submit(trans('booking.book'), ['type' => 'submit', 'class' => 'btn btn-primary', 'name' => 'submit']) !!}
                            </div>
                        {{ Form::close() }}
                        </div>
                        <div class="clear"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
