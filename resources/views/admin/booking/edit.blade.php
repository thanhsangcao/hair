@extends('admin.master')
@section('title','Edit Bookings')
@section('main')
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">{{ __('Bookings') }}</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-md-12 col-lg-12">  
                <div class="panel panel-primary">
                    <div class="panel-heading">{{ __('Edit Booking #') . $booking->id }}</div>
                    <div class="panel-body">
                        {!! Form::open(['method' => 'post', 'enctype' => 'multipart/form-data', 'id' => 'form']) !!}
                            <div class="form-group" >
                            <h4>
                                {!! Form::label('', __('Status')) !!}
                                @include('admin.booking.status')
                            </h4>
                            @if (session('status'))
                                <div class="alert alert-success">
                                    {{ session('status') }}
                                </div>
                            @endif
                            <hr/>
                            </div>
                            <div class="row">
                                <div class="col-xs-6">
                                    <div class="form-group" >
                                        {!! Form::label('', __('Name')) !!}
                                        {!! Form::text('name', $booking->name, ['class' => 'form-control', 'required' => 'required', 'form' => 'form']) !!}
                                    </div>
                                    <div class="form-group" >
                                        {!! Form::label('', __('Phone')) !!}
                                        {!! Form::text('phone_number', $booking->phone_number, ['class' => 'form-control', 'required' => 'required', 'form' => 'form']) !!}
                                    </div>
                                    <div class="form-group" >
                                        {!! Form::label('', __('Stylist')) !!}
                                        {!! Form::select('stylist_id', $selectStylist, $selectedStylist, ['class' => 'form-control', 'required' => 'required', 'form' => 'form']) !!}
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('', __('Service')) !!}
                                        <br/>
                                        @if (!isset($booking->bill))
                                            {!! Form::button('Add Service', ['class' => 'btn btn-primary btn-add', 'data-toggle' => 'modal', 'data-target' => '#myModal', 'form' => 'delete']) !!}
                                        @endif
                                        <div class="table-responsive">
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr class="bg-primary">
                                                        <th>{{ __('Name') }}</th>
                                                        <th>{{ __('Price (VND)') }}</th>
                                                        @if (!isset($booking->bill))
                                                        <th id='options'>{{ __('Action') }}</th>
                                                        @endif
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($booking->services as $service)
                                                    <tr>
                                                        <td>{{ $service->name }}</td>
                                                        <td>{{ number_format($service->price) }}</td>
                                                        @if (!isset($booking->bill))
                                                        <td>
                                                            <a href="{{ asset('admin/bookings/' . $booking->id . '/deleteService/' . $service->id) }}" class="btn btn-danger del">{{ __('Delete') }}</a>
                                                        </td>
                                                        @endif
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <td><b>{{ __('Grand Total') }}</b></td>
                                                        <td>{{ number_format($booking->services->sum('price')) }}</td>
                                                        @if (!isset($booking->bill))
                                                        <td></td>
                                                        @endif
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="form-group" >
                                        @if ($booking->status != __('booking.complete'))
                                            {!! Form::button('OK', ['type' => 'submit', 'class' => 'btn btn-primary', 'name' => 'submit', 'form' => 'form']) !!}
                                            <a href="{{ route('bookings.index') }}" class="btn btn-danger">{{ __('Cancel') }}</a>
                                        @else
                                            <a href="{{ route('bookings.index') }}" class="btn btn-primary">{{ __('Back') }}</a>
                                            @if( !isset($booking->bill))
                                                <a href="{{ route('bills.create', $booking->id) }}" class="btn btn-primary">{{ __('Create Bill') }}</a>
                                            @else
                                                <a href="{{ route('bills.show', $booking->bill->id) }}" class="btn btn-primary">{{ __('Show Bill') }}</a>
                                            @endif
                                        @endif
                                    </div>
                                </div>
                                <div class="col-xs-6">
                                    <div class="form-group" >
                                        {!! Form::label('', __('Salon')) !!}
                                        {!! Form::text('salon_id', $booking->salon->name, ['class' => 'form-control', 'disabled' => 'disabled']) !!}
                                    </div>
                                    <div class="form-group" >
                                        {!! Form::label('', __('Time Booking')) !!}
                                        {!! Form::text('time', $booking->time_booking, ['class' => 'form-control', 'disabled' => 'disabled']) !!}
                                    </div>
                                    <div class="form-group" >
                                        {!! Form::label('', __('Created At')) !!}
                                        {!! Form::text('created_at', $booking->created_at, ['class' => 'form-control', 'disabled' => 'disabled']) !!}
                                    </div>     
                                </div>
                            </div>
                            {!! Form::token() !!}
                        {!! Form::close() !!}
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">
        <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">{{ __('Add Service') }}</h4>
                </div>
                <div class="modal-body">
                    <div class="table-responsive">
                            <table class=" table table-bordered">
                                <thead>
                                    <tr class="bg-primary">
                                        <th>{{ __('ID') }}</th>
                                        <th>{{ __('Name') }}</th>
                                        <th>{{ __('Action') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($services as $service)
                                        <tr>
                                            <td>{{ $service->id}}</td>
                                            <td>{{ $service->name}}</td>
                                            <td>
                                                {!! Form::button('ADD', ['class' => 'btn btn-primary btn-service', 'value' => $service->id, 'data-service' => $service->id]) !!}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection
