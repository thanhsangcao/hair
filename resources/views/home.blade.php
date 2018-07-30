@extends('master')
@section('title', 'Home')
@section('content')
<div class="container">
    <div class="my_slider">
        <div id="myCarousel" class="carousel slide " data-ride="carousel">

            <!-- Indicators -->
            <ol class="carousel-indicators ">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner ">
                <div class="item active ">
                    <img src="{{ asset('images/background.jpg') }}" alt="background" >
                    <div class="carousel-caption">
                        <h3>{{ __('Framgia Lab')}}</h3>
                        <p>{!! trans('main.Address') !!}</p>
                    </div>

                </div>

                <div class="item ">
                    <img src="{{ asset('images/slide2.jpg') }}" alt="example1" >
                </div>

                <div class="item ">
                    <img src="{{ asset('images/slide3.jpg') }}" alt="example2">
                </div>
            </div>

            <!-- Left and right controls -->
            <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>
                <span class="sr-only">{{ __('Previous')}}</span>
            </a>
            <a class="right carousel-control" href="#myCarousel" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span>
                <span class="sr-only">{{ __('Next')}}</span>
            </a>
        </div>
    </div>
</div>
<div>
    <div class="col-md-12 text-center" >
        <button type="button" class="btn btn-lg btn-success" >{!! trans('main.Booking') !!}</button>          
        
    </div>
</div>
<div class="col-md-12 col-xs-12 col-lg-12"> 
    <div class="btn-group  btn-group-justified" role="group" aria-label="...">
        <div class="btn-group " role="group">
            <button type="button" class="btn btn-primary">{!! trans('main.Salons') !!}</button>
        </div>
        <div class="btn-group" role="group">
            <button type="button" class="btn btn-primary">{!! trans('main.Stylists') !!}</button>
        </div>
    </div>
</div>
@endsection

