@extends('admin.master')
@section('title','Danh sách User')
@section('main')    
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">{{ __('User') }}</h1>
            </div>
        </div><!--/.row-->
        
        <div class="row">
            <div class="col-xs-12 col-md-12 col-lg-12">
                
                <div class="panel panel-primary">
                    <div class="panel-heading">{{ __('List of Users') }}</div>
                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="bootstrap-table">
                            <div class="table-responsive">
                                <a href="{{ asset('admin/users/create') }}" class="btn btn-primary">{{ __('Add User') }}</a>
                                <table class="table table-bordered" id="salon">             
                                    <thead>
                                        <tr class="bg-primary">
                                            <th>{{ __('ID') }}</th>
                                            <th>{{ __('Name') }}</th>
                                            <th>{{ __('Email') }}</th>
                                            <th class="width-user">{{ __('Address') }}</th>
                                            <th>{{ __('Phone Number') }}</th>
                                            <th>{{ __('Permission') }}</th>
                                            <th>{{ __('Salon') }}</th>
                                            <th>{{ __('Options') }}</th>
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
                                                    {{ Form::submit('Delete', array('class' => 'btn btn-danger','onClick' => "return confirm('Bạn có chắc chắn muốn xóa')")) }}
                                                {{ Form::close() }}
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                <script type="text/javascript">
                                $(document).ready(function(e) {
                                    $('.pagination li a').click(function() {
                                        
                                        var page = $(this).attr('href').split('page=')[1];
                                        
                                        $.get('users?page=' + page, function(data){
                                            $('body').html(data);
                                        }); 
                                        return false;
                                    });
                                });
                                </script>
                                {{ $users->links() }}                             
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div><!--/.row-->
    </div>  <!--/.main-->
@stop
