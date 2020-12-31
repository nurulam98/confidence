<nav class="navbar navbar-expand-lg navbar-light">
    <div class="container">
        <a class="navbar-brand" href="#"><img src="{{ asset('assets/img/logo.png')}}" alt=""></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav ml-auto">
            <a class="nav-item nav-link {{ (\Request::route()->getName() == 'homepage') ? 'active' : ''}}" href="{{ route('homepage')}}">Home</a>

            @if (Auth::check())
                <a class="nav-item nav-link" href="{{ route('dashboard') }}">Dashboard</a>
            @else
                <a class="nav-item nav-link {{ (\Request::route()->getName() == 'login') ? 'active' : ''}}" href="{{ route('login') }}">Login</a>
                <a class="nav-item btn btn-primary tombol {{ (\Request::route()->getName() == 'register') ? 'active' : ''}}" href="{{ route('register') }}">Registrasi</a>
            @endif
        </div>
        </div>
    </div>
  </nav>