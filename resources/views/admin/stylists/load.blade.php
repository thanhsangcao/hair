<div class="table-responsive">
    <table class="table table-bordered" id="salon">             
        <thead>
            <tr class="bg-primary">
                <th>{{ __('ID') }}</th>
                <th class="width_salon">{{ __('Stylist_ID') }}</th>
                <th class="width_salon">{{ __('Name') }}</th>
                <th class="width_salon">{{ __('Monday') }}</th>
                <th class="width_salon">{{ __('Tuesday') }}</th>
                <th class="width_salon">{{ __('Wednesday') }}</th>
                <th class="width_salon">{{ __('Thursday') }}</th>
                <th class="width_salon">{{ __('Friday') }}</th>
                <th class="width_salon">{{ __('Saturday') }}</th>
                <th class="width_salon">{{ __('Sunday') }}</th>
                <th class="width_salon">{{ __('Options') }}</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($time_sheets as $time_sheet)
            <tr>
                <td>{{ $time_sheet->id }}</td>
                <td>{{ $time_sheet->stylist_id }}</a></td>
                <td><a href="{{ asset('admin/manage_stylists/' . $time_sheet->id . '/edit') }}">{{ $time_sheet->user->name }}</a></td>                                      
                <td>{{ $time_sheet->mon }}</td>
                <td>{{ $time_sheet->tues }}</td>
                <td>{{ $time_sheet->wed }}</td>
                <td>{{ $time_sheet->thur }}</td>
                <td>{{ $time_sheet->fri }}</td>
                <td>{{ $time_sheet->sat }}</td>
                <td>{{ $time_sheet->sun }}</td>

                <td>
                    <a href="{{ asset('admin/manage_stylists/' . $time_sheet->id . '/edit') }}" class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i> {{ __('Edit') }}</a>
                    {{ Form::open(array( 'url' => 'admin/manage_stylists/' . $time_sheet->id, 'class' => 'pull-right')) }}
                        {{ Form::hidden('_method', 'DELETE') }}
                        {{ Form::submit('Delete', array('class' => 'btn btn-danger del','onClick' => "return confirm('Are you sure ? ')")) }}
                    {{ Form::close() }}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    
    {{ $time_sheets->links() }}                             
</div>
<script type="text/javascript">
    $('.del').on('click', function () {
        return confirm("{{ __('Are u sure?') }}");
    });
</script>
