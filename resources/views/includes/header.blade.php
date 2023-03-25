<!-- navbar navigation component -->
<nav class="navbar navbar-expand-lg navbar-white bg-white">
    {{--<button type="button" id="sidebarCollapse" class="btn btn-light">
        <i class="fas fa-bars"></i><span></span>
    </button>--}}
    <div class="sidebar-header">
        {{--<img src="assets/img/bootstraper-logo.png" alt="Au Browser" class="app-logo">--}}
        <a href="{{ route('home') }}"> AU Browser</a>
    </div>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="nav navbar-nav ms-auto">
            @guest
                <li>
                    <a href="{{ route('login') }}"><i class="fas fa-sign-in-alt"></i> Login</a>
                </li>
                &nbsp;&nbsp;|&nbsp;&nbsp;
                <li>
                    <a href="{{ route('register') }}"><i class="fas fa-user"></i> Register</a>
                </li>
            @endguest
            @auth
                <li class="nav-item mt-3">
                    <a href="{{ route('user.marketplace') }}"> Marketplace</a>
                </li>
                <li class="nav-item dropdown">
                    <div class="nav-dropdown">
                        <a href="#" id="nav2" class="nav-item nav-link dropdown-toggle text-secondary" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-user"></i> <span>{{ auth()->user()->username }}</span> <i style="font-size: .8em;" class="fas fa-caret-down"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end nav-link-menu">
                            <ul class="nav-list">
                                <li><a href="{{ route('user.dashboard') }}" class="dropdown-item"><i class="fas fa-address-card"></i> Dashboard</a></li>
                                <li><a href="{{ route('user.dashboard.preferences') }}" class="dropdown-item"><i class="fas fa-list"></i> Preferences</a></li>
                                <li><a href="{{ route('user.marketplace.orders') }}" class="dropdown-item"><i class="fas fa-list"></i> Orders</a></li>
                                <li><a href="{{ route('user.dashboard.referrals') }}" class="dropdown-item"><i class="fas fa-inbox"></i> Invite a friend</a></li>
                                <li><a href="{{ route('user.dashboard.account') }}" class="dropdown-item"><i class="fas fa-user"></i> Account</a></li>
                                {{--<li><a href="" class="dropdown-item"><i class="fas fa-address-card"></i> Profile</a></li>
                                <li><a href="" class="dropdown-item"><i class="fas fa-envelope"></i> Messages</a></li>
                                <li><a href="" class="dropdown-item"><i class="fas fa-cog"></i> Settings</a></li>--}}
                                <div class="dropdown-divider"></div>
                                <li><a href="{{ route('user.logout') }}" class="dropdown-item"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
                            </ul>
                        </div>
                    </div>
                </li>
                &nbsp;
            @endauth
        </ul>
    </div>
</nav>
