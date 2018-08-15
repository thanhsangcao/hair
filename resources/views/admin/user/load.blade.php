<div class="table-responsive load">
    <a href="{{ asset('admin/users/create') }}" class="btn btn-primary">{{ __('Add User') }}</a>
    <table class="table table-bordered">             
        <thead>
            <tr class="bg-primary">
                <th>{{ __('ID') }}</th>
                <th>{{ __('Name') }}</th>
                <th>{{ __('Email') }}</th>
                <th>{{ __('Address') }}</th>
                <th>{{ __('Phone Number') }}</th>
                <th>{{ __('Permission') }}</th>
                <th>{{ __('Salon') }}</th>
                <th id="options">{{ __('Options') }}</th>
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
                <th>{{ $user->salon->name }}</th>
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

    {{ $users->links() }}     

</div>

<script type="text/javascript">
    $('.del').on('click', function () {
        return confirm("{{ __('Are u sure?') }}");
    });
</script>
