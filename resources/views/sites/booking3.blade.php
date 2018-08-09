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
                        {{ Form::hidden('stylist_id', session('stylist_id')) }}
                         <div class="wrap-booking-time col-md-7 col-sm-12 col-xs-12 row2">
                             <label class="text-success form-name">
                                 <h4>
                                     <i class="fa fa-user" aria-hidden="true"></i>
                                         {{ __('Choose Time') }}
                                </h4>
                            </label>
                            <div class="form-group">
                                <select class="form-control input-lg" name="timesheetstylist">
                                    @foreach($user as $us)
                                        @if($us->id == session('stylist_id'))
                                        @if($us->timesheetStylist->mon == 'yes')
                                            <option id="{{ $us->timesheetStylist->stylist_id }}">
                                                {{ trans('main.mon') }}
                                            </option>
                                        @endif
                                        @if($us->timesheetStylist->tues == 'yes')
                                            <option id="{{ $us->timesheetStylist->stylist_id }}">
                                                {{ trans('main.tue') }}
                                            </option>
                                        @endif
                                        @if($us->timesheetStylist->wed == 'yes')
                                            <option id="{{ $us->timesheetStylist->stylist_id }}">
                                                {{ trans('main.wed') }}
                                            </option>
                                        @endif
                                        @if($us->timesheetStylist->thur == 'yes')
                                            <option id="{{ $us->timesheetStylist->stylist_id }}">
                                                {{ trans('main.thur') }}
                                            </option>
                                        @endif
                                        @if($us->timesheetStylist->fri == 'yes')
                                            <option id="{{ $us->timesheetStylist->stylist_id }}">
                                                {{ trans('main.fri') }}
                                            </option>
                                        @endif
                                        @if($us->timesheetStylist->sat == 'yes')
                                        <option id="{{ $us->timesheetStylist->stylist_id }}">
                                                {{ trans('main.sat') }}
                                            </option>
                                        @endif
                                        @if($us->timesheetStylist->sun == 'yes')
                                        <option id="{{ $us->timesheetStylist->stylist_id }}">
                                                {{ trans('main.sun') }}
                                            </option>
                                        @endif
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                            <a href="{{ asset('/bookings') }}" class="btn btn-danger">{{ __('Prev') }}</a>
                            {!! Form::submit(trans('booking.book'), ['type' => 'submit', 'class' => 'btn btn-primary', 'name' => 'submit']) !!}
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
