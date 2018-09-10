<div class="table-responsive load col-xs-6">
    <a href="{{ asset('admin/services/create') }}" class="btn btn-primary btn-add">{{ __('Add Service') }}</a>
    <table class="table table-bordered" id="salon">             
        <thead>
            <tr class="bg-primary">
                <th>{{ __('ID') }}</th>
                <th class="width_salon">{{ __('Name') }}</th>
                <th class="width_salon">{{ __('Price') }}</th>
                <th id="options-service">{{ __('Options') }}</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($services as $service)
            <tr>
                <td>{{ $service->id }}</td>
                <td><a href="{{ asset('admin/services/' . $service->id . '/edit') }}">{{ $service->name }}</a></td>
                <td>{{ $service->price }}</td>
                <td>
                    <a href="{{ asset('admin/services/' . $service->id . '/edit') }}" class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i> {{ __('Edit') }}</a>
                    {{ Form::open(array( 'url' => 'admin/services/' . $service->id, 'class' => 'pull-right')) }}
                        {{ Form::hidden('_method', 'DELETE') }}
                        {{ Form::submit('Delete', array( 'class' => 'btn btn-danger del' )) }}
                    {{ Form::close() }}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {{ $services->links() }}  
                               
</div>
