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
            <a href="{{ asset('/home')}}" class="btn btn-success">{!! trans('main.Booking') !!}</a>
        </div>
    </div>
    <div>
        <div class="col-md-12 "> 
            <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#salon_list">
            {{ __('Our salons')}}
            </button>
            <div id="salon_list" class="collapse">
                <div class="col-md-6 col-xs-6 col-lg-6 table-headline">{!! __('Address') !!}</div>
                <div class="col-md-6 col-xs-6 col-lg-6 table-headline">{!! __('Name') !!}</div>
                @foreach ($salons as $salon)
                    <div class="col-md-6 col-xs-6 col-lg-6 table-border">{!! $salon->address !!}</div>
                    <div class="col-md-6 col-xs-6 col-lg-6 table-border">{{ $salon->name }}</div>
                @endforeach
            </div>
        </div>
    </div>
    <div>
        <div class="col-md-12 "> 
            <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#stylist_list">
            {{ __('Our stylists')}}
            </button>
            <div id="stylist_list" class="collapse">
                @foreach ($users as $user)
                    @if ($user->permission == '2')
                    <div class="col-md-6 col-xs-6 col-lg-6 table-border">{!! $user->name !!}</div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>

</div>
@endsection

