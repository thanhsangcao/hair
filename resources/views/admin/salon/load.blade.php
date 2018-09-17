<div class="table-responsive load">
    <div id="toolbar">
        <a href="{{ asset('admin/salons/create') }}" class="btn btn-primary btn-add">{{ __('Add Salon') }}</a>
    </div>
    <table class="table-bordered table-striped" data-toggle="table" data-toolbar="#toolbar" data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc" id="salon">             
        <thead>
            <tr class="bg-primary">
                <th>{{ __('ID') }}</th>
                <th class="width_salon" data-field="state" data-sortable="true">{{ __('Name') }}</th>
                <th class="width_salon" data-field="state" data-sortable="true">{{ __('Address') }}</th>
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

</div>
