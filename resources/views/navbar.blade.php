<header role="banner">
    <nav class="navbar navbar-expand-md navbar-dark bg-light">
        <div class="container">
            <a class="navbar-brand" href="/"> Barber</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample05" aria-controls="navbarsExample05" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse navbar-light" id="navbarsExample05">
                <ul class="navbar-nav ml-auto pl-lg-5 pl-0">
                    <li class="nav-item">
                        <a class="nav-link active" href="/">{{ trans('main.Home') }}</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ trans('Haircut')}}</a>
                        <div class="dropdown-menu" aria-labelledby="dropdown04">
                            <a class="dropdown-item" href="#">Crew Cut</a>
                            <a class="dropdown-item" href="#">Regular Hair Cut</a>
                            <a class="dropdown-item" href="#">Shampoo + Cut</a>
                            <a class="dropdown-item" href="#">Beard Trim with Razor</a>
                            <a class="dropdown-item" href="#">Hair Color</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">{{ trans('About')}}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">{{ trans('Contact')}}</a>
                    </li>
                    <li class="dropdown nav-item">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdown03" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ trans('main.Member')}}</a>
                        <div class="dropdown-menu" aria-labelledby="dropdown03">
                            @if (Auth::check())
                                @role('admin')
                                    <a class="dropdown-item" href="{{ asset('/admin') }}">{!! trans('main.Admin') !!}</a>
                                @endrole
                            @endif
                            @if (Auth::check())
                                @role('stylist')
                                    <a class="dropdown-item" href="{{ asset('/admin') }}">{!! trans('main.Member') !!}</a>
                                @endrole
                                <a class="dropdown-item" href="{{ asset('admin/logout') }}">{!! trans('main.Logout') !!}</a>
                            @else
                                <a class="dropdown-item" href="{{ asset('admin/login') }}">{!! trans('main.Login') !!}</a>
                            @endif
                        </div>
                    </li>
                </ul>
            </div>
        </div>
  </nav>
</header>
