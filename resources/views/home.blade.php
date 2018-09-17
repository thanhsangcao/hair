@extends('master')
@section('title', 'Home')
@section('content')

<section class="site-hero overlay" data-stellar-background-ratio="0.5" style="background-image: url(images/big_image_1.jpg);">
    <div class="container">
        <div class="row align-items-center site-hero-inner justify-content-center">
            <div class="col-md-8 text-center">
                <div class="mb-5 element-animate">
                    <img src="images/barber2.png" alt="Image placeholder" class="img-md-fluid" >
                    <p><a href="/booking" class="btn btn-black">{{ __('Book Now') }}</a></p>
                </div>
            </div>
        </div>
    </div>
</section>
    <!-- END section -->
<section class="site-section">
    <div class="container">
        <div class="row">
            <div class="col-md-4 pr-5">
                <h2 class="mb-3">{{ __('Services') }}</h2>
                <p class="mb-5">{{ __('Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.') }} </p>
                <div class="mb-3 custom-nav">
                    <a href="#" class="btn btn-primary btn-sm custom-prev mr-2 mb-2"><span class="ion-android-arrow-back"></span></a> 
                    <a href="#" class="btn btn-primary btn-sm custom-next mr-2 mb-2"><span class="ion-android-arrow-forward"></span></a>
                </div>
            </div>
            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-12 slider-wrap">
                        <div class="owl-carousel owl-theme no-nav js-carousel-1">
                            @foreach($services as $service)
                                @if($service->show == 1)
                                    <a href="#" class="img-bg" style="background-image: url('images/{{ $service->img }}')">
                                        <div class="text">
                                            <span class="icon custom-icon flaticon-scissors"></span>
                                            <h2>{{ $service->name }}</h2>
                                            <p>{{ __('Read More') }}</p>
                                        </div>
                                    </a>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
  </div>
</section>
    <!-- END section -->

<section class="site-section">
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-md-7 text-center">
                <h2>Barber Features</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum magnam illum maiores adipisci pariatur, eveniet.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="media d-block media-feature text-center">
                    <div class="mr-3 icon-wrap"><span class="custom-icon flaticon-scissors-1"></span></div>
                    <div class="media-body">
                        <h3>Shave &amp; Haircut</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corrupti, assumenda rem nulla odio iure animi repellat voluptates ullam omnis enim?</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="media d-block media-feature text-center">
                    <div class="mr-3 icon-wrap"><span class="custom-icon flaticon-cream"></span></div>
                    <div class="media-body">
                        <h3>Cream &amp; Shampoo</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corrupti, assumenda rem nulla odio iure animi repellat voluptates ullam omnis enim?</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="media d-block media-feature text-center">
                    <div class="mr-3 icon-wrap"><span class="custom-icon flaticon-moustache"></span></div>
                    <div class="media-body">
                        <h3>Mustache Expert</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corrupti, assumenda rem nulla odio iure animi repellat voluptates ullam omnis enim?</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <div class="media d-block media-feature text-center">
                    <div class="mr-3 icon-wrap"><span class="custom-icon flaticon-scissors"></span></div>
                    <div class="media-body">
                        <h3>Haircut Styler</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corrupti, assumenda rem nulla odio iure animi repellat voluptates ullam omnis enim?</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="media d-block media-feature text-center">
                    <div class="mr-3 icon-wrap"><span class="custom-icon flaticon-razor"></span></div>
                    <div class="media-body">
                        <h3>Razor For Beards</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corrupti, assumenda rem nulla odio iure animi repellat voluptates ullam omnis enim?</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="media d-block media-feature text-center">
                    <div class="mr-3 icon-wrap"><span class="custom-icon flaticon-hair-comb"></span></div>
                    <div class="media-body">
                        <h3>Haircomb</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corrupti, assumenda rem nulla odio iure animi repellat voluptates ullam omnis enim?</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- END section -->

<section class="section-cover cta" data-stellar-background-ratio="0.5" style="background-image: url(images/big_image_2.jpg);">
    <div class="container">
        <div class="row justify-content-center align-items-center intro">
            <div class="col-md-8 text-center element-animate">
                <h2 class="mb-4"><span>Appoint a Haircut Today and</span> Get 25% discount</h2>
                <p><a href="#" class="btn btn-black">Make an Appointment</a></p>
            </div>
        </div>
    </div>
</section>
<!-- END section -->

<section class="site-section">
    <div class="container">
        <div class="row">
            <div class="col-md-6 video-wrap mb-5">
                <img src="images/img_5.jpg" alt="Image placeholder" class="img-fluid">
                <a href="https://www.youtube.com/watch?v=9KIYw5D3I5A" class="popup-vimeo btn-video"><span class="fa fa-play"></span></a>
            </div>
            <div class="col-md-6 pl-md-5">
                <h3>Good Looking Style</h3>
                <p class="lead">Start with us today</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quam facere a excepturi quod impedit rerum ipsum totam incidunt, necessitatibus id veritatis maiores quos saepe dolore commodi magnam fugiat. Incidunt, omnis.</p>
                <p>Nobis quae eaque facere architecto eligendi, voluptas quasi, blanditiis aperiam possimus inventore quis nam! Cupiditate necessitatibus, voluptatem excepturi placeat exercitationem quos vitae ut vero dolorem, provident sit odio porro facere.</p>
            </div>
        </div>
    </div>
</section>
    <!-- END section -->
@endsection
