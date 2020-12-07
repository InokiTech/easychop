<nav class="main-header navbar navbar-expand navbar-{{setting('app_theme')}}">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link desktop-toggle" id="toggleClose" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
        <a class="nav-link mobile-toggle" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
      </li>
    </ul>

    @role('admin')
    <!-- SEARCH FORM -->
    <div class="d-none d-md-block d-lg-block d-xl-block">
    <form method="GET" action="/user" class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" name="search" placeholder="Search users" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fa fa-search"></i>
          </button>
        </div>
      </div>
    </form>
    </div>
    @endrole

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      @impersonating
      <li class="nav-item">
        <a class="nav-link text-danger btn btn-none btn-outline-primary" href="{{ route('impersonate.leave') }}">
          <p><i class="fa fa-ban mr-2" aria-hidden="true"></i>{{'Exit Impersonation'}}</p>
        </a>
      </li>
      @endImpersonating
      <!-- User Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <img src="{{Auth::user()->avatar?Auth::user()->avatar:asset('uploads/avatar/avatar.png')}}" width="28px" class="img img-circle  img-responsive" alt="User Image">
          {{auth()->user()->fullname}}
          <i class="fa fa-angle-down right"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <div class="dropdown-divider"></div>
          <a href="/dashboard/profile" class="dropdown-item">
            <i class="fa fa-user mr-2"></i> Profile
          </a>

          <a href="/activity-log" class="dropdown-item">
            <i class="fa fa-list mr-2"></i> Activity Log
          </a>

          @role('admin')
          <a href="/settings" class="dropdown-item">
            <i class="fa fa-gear mr-2"></i> Application Settings
          </a>
          @endrole

          <div class="dropdown-divider"></div>
          <a href="/logout" class="dropdown-item dropdown-footer bg-gray"><i class="fa fa-sign-out mr-2"></i> Logout</a>
        </div>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-{{setting('app_sidebar')}}-light elevation-4">
    <!-- Brand Logo -->
    <div class="navbar-brand d-flex justify-content-center">
      <a style="display:none;" class="nav-link  toggleopen"  data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
      <a href="/" class="app-logo brand-link">
        @if(setting('app_dark_logo')||setting('app_light_logo'))
          <img src="{{(setting('app_sidebar')=='light')? asset('uploads/appLogo/app-logo-dark.png'):asset('uploads/appLogo/app-logo-light.png')}}" alt="App Logo" class=" img brand-image img-responsive" style="opacity: .8;">

        @else
          <img src="{{(setting('app_sidebar')=='light')? asset('uploads/appLogo/logo-dark.png'):asset('uploads/appLogo/logo-light.png')}}" alt="App Logo" class="img brand-image img-responsive" style="opacity: .8;">

        @endif
      </a>

    </div>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <a href="/dashboard/profile"><img src="{{Auth::user()->avatar?Auth::user()->avatar:asset('uploads/avatar/avatar.png')}}" width="40px" class="img img-circle  img-responsive" alt="User Image"></a>
        </div>
        <div class="info">
          <a href="/dashboard/profile" class="d-block">{{Auth::user()->firstname}}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="/dashboard" class="nav-link {{request()->is('/')? 'sidebar-active':''}}">
              <i class="nav-icon fa fa-home"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>

          @role('admin')
            @can('manage-user')
                <li class="nav-item has-treeview">
                    <a href="{{route('user.index')}}" class="nav-link {{request()->is('user*')? 'sidebar-active':''}}">
                    <i class="nav-icon fa fa-users"></i>
                    <p>
                    Users
                    </p>
                    </a>
                </li>
            @endcan
                <li class="nav-item">
                    <a href="{{route('activity-log.index')}}" class="nav-link {{request()->is('activity-log*')? 'sidebar-active':''}}">
                    <i class="nav-icon fa fa-tasks"></i>
                    <p>
                        Activity Log
                    </p>
                    </a>
                </li>
            @can('manage-role')
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link {{(request()->is('role*')||request()->is('permission*'))? 'sidebar-active':''}}">
                    <i class="nav-icon fa fa-key"></i>
                    <p>
                        Roles & Permissions
                        <i class="right fa fa-angle-left"></i>
                    </p>
                    </a>
                    <ul class="nav nav-treeview">
                    @can('manage-role')
                    <li class="nav-item">
                        <a href="{{route('role.index')}}" class="nav-link {{request()->is('role*')? 'sidebar-active':''}}">
                        <i class="fa fa-user-secret nav-icon"></i>
                        <p>Roles</p>
                        </a>
                    </li>
                    @endcan

                    @can('manage-permission')
                        <li class="nav-item has-treeview">
                        <a href="{{route('permission.index')}}" class="nav-link {{request()->is('permission*')? 'sidebar-active':''}}">
                            <i class="fa fa-user-secret nav-icon"></i>
                            <p>Permission</p>
                        </a>
                        </li>
                    @endcan
                    </ul>
                </li>
            @endcan
                <li class="nav-item">
                    <a href="{{route('settings.index')}}" class="nav-link {{request()->is('settings')? 'sidebar-active':''}}">
                    <i class="nav-icon fa fa-gear"></i>
                    <p>
                        Application Settings
                    </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#shop" class="nav-link {{request()->is('shop*')? 'sidebar-active':''}}">
                    <i class="nav-icon fa fa-shopping-basket"></i>
                    <p>
                            Shops
                    </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#order" class="nav-link {{request()->is('orders*')? 'sidebar-active':''}}">
                    <i class="nav-icon fa fa-shopping-cart"></i>
                    <p>
                            Orders
                    </p>
                    </a>
                </li>
          @endrole

          @role('vendors')
          @auth
                <li class="nav-item">
                    <a href="#shop" class="nav-link {{request()->is('shop*')? 'sidebar-active':''}}">
                    <i class="nav-icon fa fa-shopping-basket"></i>
                    <p>
                        Shops
                    </p>
                    </a>
                </li>
            @if(auth()->user()->status == 'active')
                <li class="nav-item">
                    <a href="#order" class="nav-link {{request()->is('orders*')? 'sidebar-active':''}}">
                    <i class="nav-icon fa fa-shopping-cart"></i>
                    <p>
                        Orders
                    </p>
                    </a>
                </li>
            @endif
         @endauth
         @endrole



        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
