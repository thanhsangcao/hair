@extends('master')
@section('content')
<section class="site-hero overlay" data-stellar-background-ratio="0.5" style="background-image: url(images/big_image_1.jpg);">
    <div class=”container”>
		<div class=”row”>
			<div class=”col-md-8 col-md-offset-2">
				<div class=”panel panel-default”>
					<div class=”panel-heading”>Registration Confirmed</div>
					<div class=”panel-body”>
					Your Email is successfully verified. Click here to <a href=”{{url('/login')}}”>login</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

@endsection
