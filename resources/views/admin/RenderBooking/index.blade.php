@extends('admin.master')
@section('title','Danh sách RenderBooking')
@section('main')    
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">{{ __('RenderBooking') }}</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-md-12 col-lg-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">{{ __('List of RenderBooking') }}</div>
                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="bootstrap-table">
                            <div class="table-responsive">
                                <a href="{{ asset('admin/renderbookings/create') }}" class="btn btn-primary btn-add">{{ __('Add RenderBooking') }}</a>
                                <table class="table table-bordered" id="salon">
                                    <thead>
                                        <tr class="bg-primary">
                                            <th>{{ __('ID') }}</th>
                                            <th class="width_renderbooking">{{ __('Day') }}</th>
                                            <th class="width_renderbooking">{{ __('Time_Start') }}</th>
                                            <th class="width_renderbooking">{{ __('Status') }}</th>
                                            <th class="width_renderbooking">{{ __('Salon_id') }}</th>
                                            <th>{{ __('Options') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($render_bookings as $render_booking )
                                        <tr>
                                            <td>{{ $render_booking->id }}</td>
                                            <td>{{ $render_booking->day }}</td>
                                            <td>{{ $render_booking->time_start }}</td>
                                            <td>{{ $render_booking->status }}</td>
                                            <td>{{ $render_booking->salon_id }}</td>
                                            <td>
                                                <a href="{{ asset('admin/renderbookings/' . $render_booking->id . '/edit') }}" class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i> {{ __('Edit') }}</a>
                                                {{ Form::open(array( 'url' => 'admin/renderbookings/' . $render_booking->id, 'class' => 'pull-right')) }}
                                                    {{ Form::hidden('_method', 'DELETE') }}
                                                    {{ Form::submit('Delete', array('class' => 'btn btn-danger','onClick' => "return confirm('Bạn có chắc chắn muốn xóa')")) }}
                                                {{ Form::close() }}
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                {{ $render_bookings->links() }}
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
