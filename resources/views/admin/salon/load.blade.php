<div class="table-responsive load">
    <a href="{{ asset('admin/salons/create') }}" class="btn btn-primary">{{ __('Add Salon') }}</a>
    <table class="table table-bordered" id="salon">             
        <thead>
            <tr class="bg-primary">
                <th>{{ __('ID') }}</th>
                <th class="width_salon">{{ __('Name') }}</th>
                <th class="width_salon">{{ __('Address') }}</th>
                <th id="options">{{ __('Options') }}</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($salons as $salon)
            <tr>
                <td>{{ $salon->id }}</td>
                <td><a href="{{ asset('admin/salons/' . $salon->id . '/edit') }}">{{ $salon->name }}</a></td>
                <td>{{ $salon->address }}</td>
                <td>
                    <a href="{{ asset('admin/salons/' . $salon->id . '/edit') }}" class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i> {{ __('Edit') }}</a>
                    {{ Form::open(array( 'url' => 'admin/salons/' . $salon->id, 'class' => 'pull-right')) }}
                        {{ Form::hidden('_method', 'DELETE') }}
                        {{ Form::submit('Delete', array('class' => 'btn btn-danger del')) }}
                    {{ Form::close() }}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {{ $salons->links() }}   

</div>
