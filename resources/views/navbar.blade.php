<nav class="navbar navbar-default">
    <div class="container-fluid">
        
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#"><img src="{{ asset('images/logo1.png') }}"></a>
        </div>
        
        <!-- Navbar Right -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li class="active"><a href="/">{!! trans('main.Home') !!}</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                    {!! trans('main.Member') !!} 
                    <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">

                    @if (Auth::check())
                        @role('admin')
                            <li><a href="{{ asset('/admin') }}">{!! trans('main.Admin') !!}</a></li>
                        @endrole
                    @endif
                    @if (Auth::check())
                        @role('stylist')
                            <li><a href="{{ asset('/admin') }}">{!! trans('main.Member') !!}</a></li>
                        @endrole
                        <li><a href="{{ asset('admin/logout') }}">{!! trans('main.Logout') !!}</a></li>
                    @else
                        <li><a href="{{ asset('admin/login') }}">{!! trans('main.Login') !!}</a></li>
                    @endif

                    </ul>
                </li>
            </ul>
        </div>

    </div><!-- /.container-fluid -->
</nav>
