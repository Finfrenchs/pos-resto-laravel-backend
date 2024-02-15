<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a>Resto Genyo</a>
            {{-- <a href="{{ route('app.dashboard-pos') }}">POS Sruput Glek</a> --}}
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a>RG</a>
            {{-- <a href="{{ route('app.dashboard-pos') }}">PSG</a> --}}
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="nav-item dropdown">
                <a href="#"
                    class="nav-link has-dropdown"><i class="fa-solid fa-house"></i><span>Dashboard</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ request()->routeIs('app.dashboard-pos') ? 'active' : '' }}">
                        {{-- <a class="nav-link" href="{{ route('app.dashboard-pos') }}">General Dashboard</a> --}}
                    </li>
                </ul>
            </li>

            <li class="nav-item dropdown">
                <a href="#"
                    class="nav-link has-dropdown"><i class="fa-solid fa-users"></i><span>Users</span></a>
                <ul class="dropdown-menu">
                    <li >
                        <a class="nav-link"
                            href="{{ route('user.index') }}">User List</a>
                    </li>
                </ul>
            </li>

            <li class="nav-item dropdown">
                <a href="#"
                    class="nav-link has-dropdown"><i class="fa-solid fa-box"></i><span>Products</span></a>
                <ul class="dropdown-menu">
                    <li >
                        {{-- <a class="nav-link"
                            href="{{ route('product.index') }}">Product List</a> --}}
                    </li>
                </ul>
            </li>

            <li class="nav-item dropdown">
                <a href="#"
                    class="nav-link has-dropdown"><i class="fa-solid fa-cart-flatbed"></i><span>Orders</span></a>
                <ul class="dropdown-menu">
                    <li >
                        {{-- <a class="nav-link"
                            href="{{ route('order.index') }}">Order List</a> --}}
                    </li>
                </ul>
            </li>

            <li class="nav-item dropdown">
                <a href="#"
                    class="nav-link has-dropdown"><i class="fa-solid fa-chart-line"></i><span>Sales Report</span></a>
                <ul class="dropdown-menu">
                    {{-- <li >
                        <a class="nav-link"
                            href="{{ route('report.index') }}">Sales Range Report Data</a>
                    </li>
                    <li >
                        <a class="nav-link"
                            href="{{ route('report.sales.report.data') }}">Sales Report Data</a>
                    </li> --}}
                </ul>
            </li>

            {{-- <li class="menu-header">Report</li>

            <li class={{ Request::is('report*') ? 'active' : '' }}>
                <a class="nav-link" href="{{ route('report.index') }}">
                <i class="fas fa-book"></i> <span>Report</span></a>
            </li> --}}

    </aside>
</div>
