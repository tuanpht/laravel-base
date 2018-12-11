<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>My Blog</title>
    <link rel="stylesheet" type="text/css" media="screen" href="{{ mix_asset('vendor/fontawesome/css/all.min.css') }}" />
    <link rel="stylesheet" type="text/css" media="screen" href="{{ mix_asset('css/admin/admin.css') }}" />
    @yield('styles')
</head>
<body class="app sidebar-mini">
    <!-- Navbar-->
    <header class="app-header">
        <a class="app-header__logo" href="index.html">Vali</a>
        <!-- Sidebar toggle button--><a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
        <!-- Navbar Right Menu-->
        <ul class="app-nav">
            <li class="app-search">
                <input class="app-search__input" type="search" placeholder="Search">
                <button class="app-search__button"><i class="fa fa-search"></i></button>
            </li>
            <!-- User Menu-->
            <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i class="fa fa-user fa-lg"></i></a>
                <ul class="dropdown-menu settings-menu dropdown-menu-right">
                    <li><a class="dropdown-item" href="page-user.html"><i class="fa fa-cog fa-lg"></i> Settings</a></li>
                    <li><a class="dropdown-item" href="page-user.html"><i class="fa fa-user fa-lg"></i> Profile</a></li>
                    <li><a class="dropdown-item" href="page-login.html"><i class="fa fa-sign-out fa-lg"></i> Logout</a></li>
                </ul>
            </li>
        </ul>
    </header>
    <!-- Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
        <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="https://s3.amazonaws.com/uifaces/faces/twitter/jsa/48.jpg" alt="User Image">
            <div>
                <p class="app-sidebar__user-name">John Doe</p>
                <p class="app-sidebar__user-designation">Frontend Developer</p>
            </div>
        </div>
        <ul class="app-menu">
            <li>
                <a class="app-menu__item" href="index.html">
                    <i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Dashboard</span>
                </a>
            </li>
            <li class="treeview">
                <a class="app-menu__item" href="#" data-toggle="treeview">
                    <i class="app-menu__icon fa fa-laptop"></i><span class="app-menu__label">Users</span>
                    <i class="treeview-indicator fa fa-angle-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a class="treeview-item" href="widgets.html"><i class="icon fa fa-list"></i> List</a></li>
                    <li><a class="treeview-item" href="components.html"><i class="icon fa fa-plus"></i> Add</a></li>
                </ul>
            </li>
        </ul>
    </aside>
    <main class="app-content">
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    @yield('content')
                </div>
            </div>
        </div>
    </main>

    <script src="{{ mix_asset('js/admin/admin.js') }}"></script>
    @yield('scripts')
</body>
</html>