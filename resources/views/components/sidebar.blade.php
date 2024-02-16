<div class="main-sidebar sidebar-style-2 bg-dark">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <i class="fa-solid fa-store fa-xl" style="color: #ffffff;"></i>
            <a class="text-white">Genyo Resto</a>
            {{-- <a href="{{ route('app.dashboard-pos') }}">POS Sruput Glek</a> --}}
        </div>
        <div class="sidebar-brand sidebar-brand-sm text-white">
            <a>GR</a>
            {{-- <a href="{{ route('app.dashboard-pos') }}">PSG</a> --}}
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header text-white">Dashboard</li>
            <li class="nav-item dropdown">
                <a href="#"
                    class="nav-link has-dropdown text-white"><i class="fa-solid fa-house text-white"></i><span class="text-white">Dashboard</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ request()->routeIs('app.dashboard-pos') ? 'active' : '' }}">
                        {{-- <a class="nav-link" href="{{ route('app.dashboard-pos') }}">General Dashboard</a> --}}
                    </li>
                </ul>
            </li>

            <li class="nav-item dropdown">
                <a href="#"
                    class="nav-link has-dropdown text-white"><i class="fa-solid fa-users text-white"></i><span class="text-white">Users</span></a>
                <ul class="dropdown-menu">
                    <li >
                        <a class="nav-link"
                            href="{{ route('user.index') }}">User List</a>
                    </li>
                </ul>
            </li>

            <li class="nav-item dropdown">
                <a href="#"
                    class="nav-link has-dropdown text-white"><i class="fa-solid fa-box text-white"></i><span class="text-white">Products</span></a>
                <ul class="dropdown-menu">
                    <li >
                        <a class="nav-link"
                            href="{{ route('product.index') }}">Product List</a>
                    </li>
                </ul>
            </li>

            <li class="nav-item dropdown">
                <a href="#"
                    class="nav-link has-dropdown text-white"><i class="fa-solid fa-layer-group text-white"></i><span class="text-white">Category</span></a>
                <ul class="dropdown-menu">
                    <li >
                        <a class="nav-link"
                            href="{{ route('category.index') }}">Category List</a>
                    </li>
                </ul>
            </li>

            <li class="nav-item dropdown">
                <a href="#"
                    class="nav-link has-dropdown text-white"><i class="fa-solid fa-cart-flatbed text-white"></i><span class="text-white">Orders</span></a>
                <ul class="dropdown-menu">
                    <li >
                        {{-- <a class="nav-link"
                            href="{{ route('order.index') }}">Order List</a> --}}
                    </li>
                </ul>
            </li>

            <li class="nav-item dropdown">
                <a href="#"
                    class="nav-link has-dropdown text-white"><i class="fa-solid fa-chart-line text-white"></i><span class="text-white">Sales Report</span></a>
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
