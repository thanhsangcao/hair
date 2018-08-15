@extends('master')
@section('siteTitle', __('Order_Booking'))
@section('content')
    
<!--   Big container   -->
<div class="container">
    <div class="row">
        <div class="col-sm-8 col-sm-offset-2">
            <!--      Wizard container        -->
            <div class="wizard-container">
                <div class="card wizard-card" data-color="blue" id="wizard">
                    {!! Form::open(['method' => 'post', 'enctype' => 'multipart/form-data']) !!}
                        <div class="wizard-header">
                            <h3 class="wizard-title">
                                {{ __('main.booking') }}
                            </h3>
                            
                        </div>
                        <div class="wizard-navigation">
                            <ul>
                                <li><a href="#info" data-toggle="tab">{{ __('main.step_1') }}</a></li>
                                <li><a href="#salon" data-toggle="tab">{{ __('main.step_2') }}</a></li>
                                <li><a href="#schedule" data-toggle="tab">{{ __('main.step_3') }}</a></li>
                                
                            </ul>
                        </div>

                        <div class="tab-content">
                            <div class="tab-pane" id="info">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <h4 class="info-text">{{ __('main.start') }}</h4>
                                    </div>
                                    <div class="col-sm-3"></div>
                                    <div class="col-sm-6">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">account_circle</i>
                                            </span>
                                            <div class="form-group label-floating">
                                                {!! Form::label('', __('Your Name'), ['class' => 'control-label']) !!}
                                                {!! Form::text('name', '', ['class' => 'form-control', 'required' => 'required']) !!}
                                            </div>
                                        </div>

                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">speaker_phone</i>
                                            </span>
                                            <div class="form-group label-floating">
                                                {!! Form::label('', __('Your PhoneNumber'), ['class' => 'control-label']) !!}
                                                {!! Form::text('phone_number', '', ['class' => 'form-control', 'required' => 'required']) !!}
                                            </div>
                                        </div>
                                        <div class="col-sm-3"></div>
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="tab-pane" id="salon">
                                <h4 class="info-text">{{ __('main.select_salon') }}</h4>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="col-sm-12">
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="material-icons">home</i>
                                                </span>
                                                <div class="form-group label-floating">
                                                    {!! Form::label('', __('Salon')) !!}
                                                    {!! Form::select('salon_id', $selectSalon, null,['class' => 'form-control', 'id' => 'salon_id']) !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane" id="schedule">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="col-sm-6 ">
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="material-icons">face</i>
                                                </span>
                                                <div class="form-group label-floating">
                                                    {!! Form::label('', __('Choose a Stylist')) !!}
                                                    <select class="form-control stylist" id="stylist_id" name="stylist_id" required="">

                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 " >
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="material-icons">date_range</i>
                                                </span>
                                                <div class="form-group label-floating">
                                                     {!! Form::label('', __('Choose a Day')) !!}
                                                    <select class="form-control timesheet" id="timesheet" name="timesheet" required="">
                                                        
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="wizard-footer">
                            <div class="pull-right">
                                {!! Form::button('next', ['class' => 'btn btn-next btn-fill btn-info btn-wd', 'name' => 'next']) !!}
                                {!! Form::button('finish', ['type' => 'submit', 'class' => 'btn btn-finish btn-fill btn-danger btn-wd', 'name' => 'finish']) !!}
                            </div>
                            <div class="pull-left">
                                {!! Form::button('previous', ['class' => 'btn btn-previous btn-fill btn-default btn-wd', 'name' => 'previous']) !!}
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div> <!-- wizard container -->
        </div>
    </div> <!-- row -->
</div> <!--  big container -->
@endsection
