<div class="table-responsive">
    <table class="table-bordered table-striped" id="salon" data-toggle="table" data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
        <thead>
            <tr class="bg-primary">
                <th data-field="id" data-sortable="true">{{ __('ID') }}</th>
                <th data-field="name"  data-sortable="true">{{ __('Name') }}</th>
                <th data-field="phone"  data-sortable="true">{{ __('Phone') }}</th>
                <th data-field="time_booking"  data-sortable="true">{{ __('Time book') }}</th>
                <th data-field="stylist"  data-sortable="true">{{ __('Stylist') }}</th>
                <th data-field="created_at"  data-sortable="true">{{ __('Created time') }}</th>
                <th data-field="status"  data-sortable="true">{{ __('Status') }}</th>
                <th id='options'>{{ __('Action') }}</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($bookings as $booking )
            <tr>
                <td>{{ $booking->id }}</td>
                <td>{{ $booking->name }}</td>
                <td>{{ $booking->phone_number }}</td>
                <td>{{ $booking->time_booking }}</td>
                <td>{{ $booking->stylist->name }}</td>
                <td>{{ $booking->created_at }}</td>
                <td>
                    @include('admin.booking.status')
                </td>
                <td>
                    <a href="{{ asset('admin/bookings/' . $booking->id . '/edit') }}" class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i> {{ __('Edit') }}</a>
                    {{ Form::open(array( 'url' => 'admin/bookings/' . $booking->id, 'class' => 'pull-right')) }}
                        {{ Form::hidden('_method', 'DELETE') }}
                        {{ Form::submit('Delete', array('class' => 'btn btn-danger del')) }}
                    {{ Form::close() }}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
