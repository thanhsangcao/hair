@extends('admin.master')
@section('title','Show Bill')
@section('main')
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">{{ __('Bill') }}</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-md-12 col-lg-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">{{ __('Bill #') }}</div>
                    <div class="panel-body">
                            <div class="row">
                                <div class="receipt-main col-xs-10 col-sm-10 col-md-6 col-xs-offset-1 col-sm-offset-1 col-md-offset-3">
                                    <div class="row">
                                        <div class="receipt-header">
                                            <div class="col-xs-6 col-sm-6 col-md-6">
                                                <div class="receipt-left">
                                                    <img class="img-responsive" src="{{ asset('images/barber.png') }}">
                                                </div>
                                            </div>
                                            <div class="col-xs-6 col-sm-6 col-md-6 text-right">
                                                <div class="receipt-right">
                                                    <p><b><h3>{{ $bill->booking->salon->name }}</h3></b></p>
                                                    <p>{{ $bill->booking->salon->address }}<i class="fa fa-location-arrow"></i></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="receipt-header receipt-header-mid">
                                            <div class="col-xs-8 col-sm-8 col-md-8 text-left">
                                                <div class="receipt-right">
                                                    <p><b><h4>{{ $bill->booking->name }}</h4></b></p>
                                                    <p><b>Mobile: </b>{{ $bill->booking->phone_number }}</p>
                                                    <p><b>Stylist: </b> {{ $bill->booking->stylist->name }}</p>
                                                    <p><b>Payment Type: </b> @if($bill->payment_type == 1)
                                                        {{ __('In Cash') }}
                                                    @else
                                                        {{ __('ATM/MasterCard') }}
                                                    @endif
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="col-xs-4 col-sm-4 col-md-4">
                                                <div class="receipt-left">
                                                    <h1>Receipt</h1>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div>
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Service</th>
                                                    <th>Price (VND)</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($bill->booking->services as $service)
                                                    <tr>
                                                        <td class="col-md-9">{{ $service->name }}</td>
                                                        <td class="col-md-3">{{ number_format($service->price) }}</td>
                                                    </tr>
                                                @endforeach
                                                <tr>
                                                   
                                                    <td class="text-right"><h2><strong>Total: </strong></h2></td>
                                                    <td class="text-left text-danger"><h2><strong><i class="fa fa-inr"></i> {{ number_format($bill->payment_amount) }}</strong></h2></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="receipt-header receipt-header-mid receipt-footer">
                                            <div class="col-xs-8 col-sm-8 col-md-8 text-left">
                                                <div class="receipt-right">
                                                    <p><b>Date: </b>{{ $bill->payment_date }}</p>
                                                    <p><i>Thank you for your business!</i></p>
                                                </div>
                                            </div>
                                            <div class="col-xs-4 col-sm-4 col-md-4">
                                                <div class="receipt-left">
                                                    <p>Signature</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group" >
                                        <a href="{{ route('bookings.edit', $bill->booking_id) }}" class="btn btn-primary">{{ __('Back') }}</a>
                                    </div>
                                </div>    
                            </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
