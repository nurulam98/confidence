<nav class="navbar page-header" style="padding-bottom: 10px;">
    <a href="#" class="btn btn-link sidebar-mobile-toggle d-md-none mr-auto">
        <i class="fa fa-bars"></i>
    </a>

    <a class="navbar-brand" href="#">
        <img src="{{ asset('assets/img/logo.png')}}" alt="logo">
    </a>

    <a href="#" class="btn btn-link sidebar-toggle d-md-down-none">
        <i class="fa fa-bars"></i>
    </a>

    <ul class="navbar-nav ml-auto">

        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="small ml-1 d-md-down-none">{{ Auth::user()->name }}</span>
            </a>

            <div class="dropdown-menu dropdown-menu-right">
                <div class="dropdown-header">Account</div>

                @if (Auth::user()->isUser == true)
                    <a href="{{ route('userProfile') }}" class="dropdown-item">
                        <i class="fa fa-user"></i> Profile
                    </a>
                @endif

                @if (Auth::user()->isAdmin == true)
                    <a href="{{ route('adminProfile') }}" class="dropdown-item">
                        <i class="fa fa-user"></i> Profile
                    </a>
                @endif

                @if (Auth::user()->isIT == true)
                    <a href="{{ route('itProfile') }}" class="dropdown-item">
                        <i class="fa fa-user"></i> Profile
                    </a>
                @endif

                <form method="POST" id="logout-form" action="{{ route('logout') }}">@csrf</form>
                <a href="#" class="dropdown-item" onclick="document.getElementById('logout-form').submit()">
                    <i class="fa fa-lock"></i> Logout
                </a>
            </div>
        </li>
    </ul>
</nav>