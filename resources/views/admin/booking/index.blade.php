@extends('admin.master')
@section('title','Danh sách Bookings')
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
                    <div class="panel-heading">{{ __('List of Bookings') }}</div>
                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="bootstrap-table">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="salon">
                                    <thead>
                                        <tr class="bg-primary">
                                            <th>{{ __('salon') }}</th>
                                            <th class="width_renderbooking">{{ __('name') }}</th>
                                            <th class="width_renderbooking">{{ __('phone_number') }}</th>
                                            <th class="width_renderbooking">{{ __('time') }}</th>
                                            <th class="width_renderbooking">{{ __('stylist') }}</th>
                                            <th class="width_renderbooking">{{ __('status') }}</th>
                                            <th>{{ __('Options') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($booking as $bk )
                                        <tr>
                                            <td>{{ $bk->salon->name }}</td>
                                            <td>{{ $bk->name }}</td>
                                            <td>{{ $bk->phone_number }}</td>
                                            <td>{{ $bk->time_booking }}</td>
                                            <td>{{ $bk->user->name }}</td>
                                            <td>{{ $bk->status }}</td>
                                            <td>
                                                <a href="{{ asset('admin/bookings/' . $bk->id . '/edit') }}" class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i> {{ __('Edit') }}</a>
                                                {{ Form::open(array( 'url' => 'admin/bookings/' . $bk->id, 'class' => 'pull-right')) }}
                                                    {{ Form::hidden('_method', 'DELETE') }}
                                                    {{ Form::submit('Delete', array('class' => 'btn btn-danger','onClick' => "return confirm('Bạn có chắc chắn muốn xóa')")) }}
                                                {{ Form::close() }}
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                {{ $booking->links() }}
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
