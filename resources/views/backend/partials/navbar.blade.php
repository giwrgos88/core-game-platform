<header class="navbar">
    <div class="container-fluid">
        <button class="navbar-toggler mobile-toggler hidden-lg-up" type="button">☰</button>
        <a class="navbar-brand" href="#">{{{ config('core_game.application-name') }}}</a>
        <ul class="sidebar-menu navbar-nav hidden-md-down">
            <li class="nav-item">
                <a class="nav-link navbar-toggler layout-toggler" href="#">☰</a>
            </li>
        </ul>
        <ul class="sidebar-menu navbar-nav float-xs-right">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                    <span class="hidden-md-down">{{{$authUser->name}}}</span>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <div class="dropdown-header text-xs-center">
                        <strong>Account</strong>
                    </div>
                    <a class="dropdown-item" href="{{URL::route('Core::admin.users.edit', $authUser->id)}}"><i class="fa fa-user"></i> Profile</a>
                    <a class="dropdown-item" href="{{URL::route('Core::admin.auth.logout')}}"><i class="fa fa-lock"></i> Logout</a>
                </div>
                </li>
            <li class="nav-item hidden-md-down">
            </li>
        </ul>
    </div>
</header>