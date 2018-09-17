<div class="table-responsive load col-xs-12">
    <div id="toolbar">
        <a href="{{ asset('admin/services/create') }}" class="btn btn-primary btn-add">{{ __('Add Service') }}</a>
        {!! Form::open(['method' => 'post', 'enctype' => 'multipart/form-data', 'url' => 'admin/services/select', 'id' => 'select']) !!}
            
            <input type="submit" form="select" value="Show" class="btn btn-success" id="submit-button">
            {!! Form::token() !!}
        {!! Form::close() !!}
    </div>
    <table class="table-bordered table-striped" data-toggle="table" data-toolbar="#toolbar" data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc" id="service">             
        <thead>
            <tr class="bg-primary">
                <th data-field="state" data-sortable="true"></th>
                <th data-field="id" data-sortable="true">{{ __('ID') }}</th>
                <th data-field="name" data-sortable="true" class="width_salon">{{ __('Name') }}</th>
                <th data-field="price" data-sortable="true"class="width_salon">{{ __('Price') }}</th>
                <th class="options-service">{{ __('Options') }}</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($services as $service)
            <tr>
                <td><input type="checkbox" name="checkbox[]" value="{{ $service->id }} " form="select" @if ( $service->show == 1 ) checked @endif></td>
                <td>{{ $service->id }}</td>
                <td><a href="{{ asset('admin/services/' . $service->id . '/edit') }}">{{ $service->name }}</a></td>
                <td>{{ number_format($service->price) }}</td>
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
</div>
