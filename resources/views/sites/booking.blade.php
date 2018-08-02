@extends('sites.master')
@section('siteTitle', __('Order_Booking'))
@section('content')
<div class="container">
    <div class="content-step">
        <div id="infor_user">
            <div class="price-box to-animate info-group-form">
                {{ Form::Open(['method' => 'POST', 'url' => 'booking1']) }}
                    @foreach ($errors -> all() as $error)
                        <p class="alert alert-danger">{{ $error }}</p>
                    @endforeach
                {!! csrf_field() !!}
                    {{ Form::label('', null, ['class' => 'text-success form-name']) }}
                        <h4>
                            <i class="fa fa-info" aria-hidden="true"></i>
                                {{trans('booking.input')}}
                        </h4>
                        <div class="form-group">
                            {{ Form::label('search_name_input', 'name', ['class' => 'search-name-input']) }}
                                <i class="fa fa-user" aria-hidden="true"></i>
                            {{ Form::text('name', '', ['class' => 'name-input form-control input-lg', 'id'=>'name', 'placeholder' => trans('booking.name')]) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('search_phone_input', 'phone', ['class' => 'search-phone-input'])}}
                                <i class="fa fa-phone" aria-hidden="true"></i>
                            {{ Form::text('phone', '', ['class' => 'phone-input form-control input-lg', 'id' => 'phone', 'placeholder' => trans('booking.phone')]) }}
                        </div>
                            {{ Form::submit(trans('booking.next'), ['class' => 'btn btn-primary step-button first-step', 'id' => 'next']) }}
                            <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                {{ Form::close() }}
            </div>
        </div>
    </div>
</div>
@endsection
