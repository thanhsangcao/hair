@extends('admin.master')
@section('title','Danh sách Salon')
@section('main')    
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">{{ __('Services') }}</h1>
            </div>
        </div><!--/.row-->
        
        <div class="row">
            <div class="col-xs-12 col-md-12 col-lg-12">
                
                <div class="panel panel-primary">
                    <div class="panel-heading">{{ __('List of Services') }}</div>
                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="bootstrap-table">
                            <div class="table-responsive">
                                <a href="{{ asset('admin/services/create') }}" class="btn btn-primary">{{ __('Add Service') }}</a>
                                <table class="table table-bordered" id="salon">             
                                    <thead>
                                        <tr class="bg-primary">
                                            <th>{{ __('ID') }}</th>
                                            <th class="width_salon">{{ __('Name') }}</th>
                                            <th class="width_salon">{{ __('Price') }}</th>
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
                                                    {{ Form::submit('Delete', array('class' => 'btn btn-danger','onClick' => "return confirm('Are you sure ? ')")) }}
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
                                        
                                        $.get('product?page=' + page, function(data) {
                                            $('body').html(data);
                                        }); 

                                        return false;
                                    });
                                });
                                </script>
                                {{ $services->links() }}                             
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div><!--/.row-->
    </div>  <!--/.main-->
@stop
