@extends('admin.master')
@section('title','Lịch làm việc của stylist')
@section('main')    
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">{{ __('Stylists') }}</h1>
            </div>
        </div><!--/.row-->
        
        <div class="row">
            <div class="col-xs-12 col-md-12 col-lg-12">
                
                <div class="panel panel-primary">
                    <div class="panel-heading">{{ __('List of Stylist') }}</div>
                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="bootstrap-table">
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
                                {{ $time_sheets->links() }}                             
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div><!--/.row-->
    </div>  <!--/.main-->
@stop
