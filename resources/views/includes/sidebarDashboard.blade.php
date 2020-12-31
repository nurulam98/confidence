<div class="sidebar">
    <nav class="sidebar-nav">
        <ul class="nav">
            <li class="nav-title">Navigation</li>

            @if (Auth::user()->isUser == true && Auth::user()->email_verified_at != "")
                <li class="nav-item">
                    <a href="{{ route('userDashboard')}}" class="nav-link {{ (\Request::route()->getName() == 'userDashboard') ? 'active' : ''}}">
                        <i class="icon icon-speedometer"></i> Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('inputCode') }}" class="nav-link {{ (\Request::route()->getName() == 'inputCode') ? 'active' : ''}}">
                        <i class="icon icon-pencil"></i> Input Kode Kupon
                    </a>
                </li>
            @endif

            @if (Auth::user()->isAdmin == true)
                <li class="nav-item">
                    <a href="{{ route('adminDashboard')}}" class="nav-link {{ (\Request::route()->getName() == 'adminDashboard') ? 'active' : ''}}">
                        <i class="icon icon-speedometer"></i> Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('userAdmin')}}" class="nav-link {{ (\Request::route()->getName() == 'userAdmin') ? 'active' : ''}}">
                        <i class="icon icon-user"></i> Data User
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('exportCouponMonth') }}" class="nav-link {{ (\Request::route()->getName() == 'exportCouponMonth') ? 'active' : ''}} {{ (\Request::route()->getName() == 'exportCouponYear') ? 'active' : ''}}">
                        <i class="icon icon-notebook"></i> Report Data
                    </a>
                </li>
            @endif

            @if (Auth::user()->isIT == true)
                <li class="nav-item">
                    <a href="{{ route('itDashboard')}}" class="nav-link {{ (\Request::route()->getName() == 'itDashboard') ? 'active' : ''}}">
                        <i class="icon icon-speedometer"></i> Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('userIT')}}" class="nav-link {{ (\Request::route()->getName() == 'userIT') ? 'active' : ''}}">
                        <i class="icon icon-user"></i> Data User
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('coupon')}}" class="nav-link {{ (\Request::route()->getName() == 'coupon') ? 'active' : ''}}">
                        <i class="icon icon-doc"></i> Data Kupon
                    </a>
                </li>
            @endif

        </ul>
    </nav>
</div>
