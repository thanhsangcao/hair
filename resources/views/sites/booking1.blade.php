@extends('sites.master')
@section('siteTitle', __('Booking1'))
@section('content')
    <div class="container">
        <div class="content-step1">
            <div id="choice_address">
                <div class="price-box infor_box_customer to-animate department-group-form">
                    <label class="text-success form-name">
                        <h4>
                            <i class="fa fa-map-marker" aria-hidden="true"></i>
                                {{ trans('booking.salon') }}
                        </h4>
                    </label>
            <div class="salons">
                <div class="row">
                    <div class="salon m_salon ">
                        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-6 fix_salon btn-a-salon">
                            <div id="50" onclick="choose_salon($(this))" class="view_salon">
                                <p class="text"> </p>
                                <p class="address_salon"> </p>
                                <p class="hidden hotline"> </p>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-6 fix_salon btn-a-salon">
                            <div id="48" onclick="choose_salon($(this))" class="view_salon">
                                <p class="text"> </p>
                                <p class="address_salon"> </p>
                                <p class="hidden hotline"> </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="clear"> </div>
            </div>
                {{ Form::Open(['method' => 'POST', 'url' => 'home']) }}
                    {{ Form:: submit(trans('booking.prev'), ['class' => 'btn-primary step-button prev-step', 'id' => 'prevStep_mobile']) }}
                        <i class="fa fa-angle-double-left" aria-hidden="true"></i>
                {{ Form::close() }}
                {{ Form::Open(['method' => 'POST', 'url' => 'booking2'])}}
                    {{ Form:: submit(trans('booking.next'), ['class' => 'btn-primary step-button second-step', 'id' => 'nextStep_mobile']) }}
                        <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
@endsection
