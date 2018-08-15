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
                    {{ Form::Open(['method' => 'POST', 'enctype' => 'multipart/form-data']) }}
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    {{ Form::hidden('name', session('name')) }}
                    {{ Form::hidden('phone_number', session('phone_number')) }}
                    <div class="form-group" >
                        {!! Form::label('', __('Salon')) !!}
                            <select class="form-control" name="salon">
                                @foreach($salon as $sl)
                                    <option value="{{ $sl->id }}"> {{ $sl->name }} - {{ $sl->address }} </option>
                                @endforeach
                            </select>
                    </div>
                        <div class="form-group">
                            <a href="{{ asset('/home') }}" class="btn btn-danger">{{ __('Prev') }}</a>
                            {!! Form::submit(trans('booking.next'), ['type' => 'submit', 'class' => 'btn btn-primary', 'name' => 'submit']) !!}
                        </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
@endsection
