<div class="table-responsive">
    <table class="table table-bordered" id="salon">
        <thead>
            <tr class="bg-primary">
                <th>{{ __('salon') }}</th>
                <th class="width_renderbooking">{{ __('Name') }}</th>
                <th class="width_renderbooking">{{ __('Phone') }}</th>
                <th class="width_renderbooking">{{ __('Time book') }}</th>
                <th class="width_renderbooking">{{ __('Stylist') }}</th>
                <th class="width_renderbooking">{{ __('Status') }}</th>
                <th class="width_renderbooking">{{ __('Created time') }}</th>
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
                <td>{{ $bk->created_at }}</td>
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