@extends('master')
@section('title','Profile')
@section('content')
<div class="container">
    <h2>{{ __('Time Sheet')}}</h2>
    @foreach($timesheets as $timesheet)
        @if (Auth::user()->id == $timesheet->stylist_id)
            <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#demo">
            {{ __('Your Time Sheet')}}
            </button>
            <a href="{{ asset('stylists/' . $timesheet->id . '/edit') }}" class="btn btn-info">
                {!! trans('main.edit_timesheet') !!}
            </a>

                <div id="demo" class="collapse">
                    <div class="col-md-6 col-xs-6 col-lg-6">{!! trans('main.mon') !!}</div>
                    <div class="col-md-6 col-xs-6 col-lg-6">{{ $timesheet->mon }}</div>
                    <div class="col-md-6 col-xs-6 col-lg-6">{!! trans('main.tue') !!}</div>
                    <div class="col-md-6 col-xs-6 col-lg-6">{{ $timesheet->tues }}</div>
                    <div class="col-md-6 col-xs-6 col-lg-6">{!! trans('main.wed') !!}</div>
                    <div class="col-md-6 col-xs-6 col-lg-6">{{ $timesheet->wed }}</div>
                    <div class="col-md-6 col-xs-6 col-lg-6">{!! trans('main.thur') !!}</div>
                    <div class="col-md-6 col-xs-6 col-lg-6">{{ $timesheet->thur }}</div>
                    <div class="col-md-6 col-xs-6 col-lg-6">{!! trans('main.fri') !!}</div>
                    <div class="col-md-6 col-xs-6 col-lg-6">{{ $timesheet->fri }}</div>
                    <div class="col-md-6 col-xs-6 col-lg-6">{!! trans('main.sat') !!}</div>
                    <div class="col-md-6 col-xs-6 col-lg-6">{{ $timesheet->sat }}</div>
                    <div class="col-md-6 col-xs-6 col-lg-6">{!! trans('main.sun') !!}</div>
                    <div class="col-md-6 col-xs-6 col-lg-6">{{ $timesheet->sun }}</div>
        @else
            <a href="{{ asset('stylists/create') }}" class="btn btn-info">{!! trans('main.add_timesheet') !!}
            </a>
        @endif
    @endforeach

</div>
@endsection

