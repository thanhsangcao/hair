@extends('sites.master')
@section('siteTitle', __('Booking2'))
@section('content')
    <div class="container">
        <div class="content-step2">
            <div id="choice_address">
                <div class="price-box infor_box_customer to-animate department-group-form">
                    <label class="text-success form-name">
                        <h4>
                            <i class="fa fa-map-marker" aria-hidden="true"></i>
                                {{ trans('booking.time') }}
                        </h4>
                    </label>
                <div class="time">
                    <div id="160" class="btn-hour col-lg-3 col-sm-3 col-md-3 col-xs-3 fix_col">
                        <div id="160" onclick="choose_time($(this))" class="btn-hour fill time_table border-red btn-hour-listing-current">
                            <p class="text hour"> </p>
                            <p class="text status"> </p>
                        </div>
                    </div>
                    <div id="160" class="btn-hour col-lg-3 col-sm-3 col-md-3 col-xs-3 fix_col">
                        <div id="160" onclick="choose_time($(this))" class="btn-hour fill time_table border-red btn-hour-listing-current">
                            <p class="text hour"> </p>
                            <p class="text status"> </p>
                        </div>
                    </div>
                    <div class="clear"> </div>
                </div>
                {{ Form::Open(['method' => 'POST', 'url' => 'booking1']) }}
                    {{ Form:: submit(trans('booking.prev'), ['class' => 'btn-primary step-button prev-step', 'id' => 'prevStep_mobile']) }}
                        <i class="fa fa-angle-double-left" aria-hidden="true"></i>
                {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
@endsection
