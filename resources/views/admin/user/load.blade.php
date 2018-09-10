<div class="table-responsive load">
    <a href="{{ asset('admin/users/create') }}" class="btn btn-primary btn-add">{{ __('Add User') }}</a>
    <table class="table-bordered table-striped" id="salon" data-toggle="table" data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">             
        <thead>
            <tr class="bg-primary">
                <th data-field="id" data-sortable="true">{{ __('ID') }}</th>
                <th data-field="name" data-sortable="true">{{ __('Name') }}</th>
                <th data-field="email" data-sortable="true">{{ __('Email') }}</th>
                <th data-field="address" data-sortable="true">{{ __('Address') }}</th>
                <th data-field="phone_number" data-sortable="true">{{ __('Phone Number') }}</th>
                <th data-field="permission" data-sortable="true">{{ __('Permission') }}</th>
                <th data-field="salon" data-sortable="true">{{ __('Salon') }}</th>
                <th class="options_user">{{ __('Options') }}</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td><a href="{{ asset('admin/users/' . $user->id . '/edit') }}">{{ $user->name }}</a></td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->address }}</td>
                <td>{{ $user->phone_number }}</td>
                <td>{{ $user->permission }}</td>
                <td>{{ $user->salon->name }}</td>
                <td>
                    <a href="{{ asset('admin/users/' . $user->id . '/edit') }}" class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i> {{ __('Edit') }}</a>
                    {{ Form::open(array('url' => 'admin/users/' .  $user->id, 'class' => 'pull-right')) }}
                        {{ Form::hidden('_method', 'DELETE') }}
                        {{ Form::submit('Delete', array('class' => 'btn btn-danger del')) }}
                    {{ Form::close() }}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

         

</div>
