<div class="sidebar sidebar-hide-to-small sidebar-shrink sidebar-gestures">
    <div class="nano">
        <div class="nano-content">
            <ul>
                <div class="logo">
                    <a href="{{ url('/') }}">
                        <!-- <img src="images/logo.png" alt="" /> --><span>Yavatmal Jain Suchi</span></a>
                </div>
                {{--<li class="label">Main</li>--}}
                <li><a href="{{ route('admin.dashboard') }}"><i class="ti-home"></i> Dashboard </a></li>
                <li><a href="{{ route('admin.settings') }}"><i class="ti-settings"></i> Settings </a></li>
                <li><a href="{{ route('admin.areas') }}"><i class="ti-list"></i> Areas </a></li>
                <li><a href="{{ route('admin.users') }}"><i class="ti-user"></i> Users </a></li>
                <li><a href="{{ route('admin.categories') }}"><i class="ti-list"></i> Categories </a></li>
                <li><a href="{{ route('admin.tracker-categories') }}"><i class="ti-list"></i> Tracker Categories </a></li>
                <li><a href="{{ route('admin.products') }}"><i class="ti-list"></i> Products </a></li>

                {{--<li class="label">Apps</li>--}}
                {{--<li><a class="sidebar-sub-toggle"><i class="ti-user"></i> Users <span
                            class="sidebar-collapse-icon ti-angle-down"></span></a>
                    <ul>
                        <li><a href="chart-flot.html">Admin</a></li>
                        <li><a href="chart-morris.html">Users</a></li>
                    </ul>
                </li>--}}
                <li><a href="{{ route('admin.logout') }}"><i class="ti-close"></i> Logout</a></li>
            </ul>
        </div>
    </div>
</div>
