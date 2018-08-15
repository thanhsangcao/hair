@extends('sites.master')
@section('siteTitle', __('Booking2'))
@section('content')
    <div class="container">
        <div class="content-step2">
            <div class="col-md-12 col-sm-12 col-xs-12 choice_address" id="choice_list_time">
                <div class="price-box to-animate">
                    <div class="row">
                        {{ Form::Open(['method' => 'POST', 'enctype' => 'multipart/form-data']) }}
                            @if (session('status'))
                                <div class="alert alert-success">
                                    {{ session('status') }}
                                </div>
                            @endif
                        {{ Form::hidden('name', session('name')) }}
                        {{ Form::hidden('phone_number', session('phone_number')) }}
                        {{ Form::hidden('salon_id', session('salon_id')) }}
                        <div class="wrap-stylist-choice col-md-5 col-sm-12 row1">
                            <label class="text-success form-name">
                                <h4>
                                     <i class="fa fa-map-marker" aria-hidden="true"></i>
                                         {{ trans('booking.stylist') }}
                                </h4>
                            </label>
                            <div class="form-group">
                                <select class="form-control input-lg" name="user">
                                    @foreach($user as $us)
                                        @if($us->salon_id == session('salon_id'))
                                            <option value="{{ $us->id }}"> {{$us->name}} </option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                         <div class="wrap-booking-time col-md-7 col-sm-12 col-xs-12 row2">
                             <label class="text-success form-name">
                                 <h4>
                                     <i class="fa fa-user" aria-hidden="true"></i>
                                         {{ __('') }}
                                </h4>
                            </label>
                            <div class="form-group">
                            <a href="{{ asset('/booking') }}" class="btn btn-danger">{{ __('Prev') }}</a>
                            {!! Form::submit(trans('booking.next'), ['type' => 'submit', 'class' => 'btn btn-primary', 'name' => 'submit']) !!}
                            </div>
                        </div>
                        <div class="clear"></div>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
