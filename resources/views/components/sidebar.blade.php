<div class="main-sidebar sidebar-style-2">
  <aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      <a href="{{ route('home') }}">ADMIN BY HIM</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
      <a href="index.html">AB</a>
    </div>
    <ul class="sidebar-menu">

      <li
        class="{{ Request::is('home/*') && !Request::is('home/*/products') && !Request::is('home/*/products/*') && !Request::is('home/*/branches') && !Request::is('home/*/branches/*') ? 'active' : '' }}">
        <a href="{{ route('dashboard', ['id' => request()->route('id')]) }}" class="nav-link">
          <i class="fas fa-fire"></i><span>Dashboard</span>
        </a>
      </li>

      <li class="menu-header">Header</li>
      <li class="{{ Request::is('home/*/branches/*') || Request::is('home/*/branches') ? 'active' : '' }}">
        <a href="{{ route('branches.index', ['id' => request()->route('id')]) }}" class="nav-link">Branch</a>
      </li>
      <li class='{{ Request::is('dashboard-general-dashboard') ? 'active' : '' }}'>
        <a href="{{ route('categories.index', ['id' => request()->route('id')]) }}" class="nav-link">Category</a>
      </li>
      <li class="{{ Request::is('home/*/products/*') || Request::is('home/*/products') ? 'active' : '' }}">
        <a href="{{ route('products.index', ['id' => request()->route('id')]) }}" class="nav-link">Products</a>
      </li>
      <li class='{{ Request::is('dashboard-general-dashboard') ? 'active' : '' }}'>
        <a href="#" class="nav-link">Stock</a>
      </li>
      <li class='{{ Request::is('dashboard-general-dashboard') ? 'active' : '' }}'>
        <a href="{{ route('users.index') }}" class="nav-link">Users</a>
      </li>
      <li class='{{ Request::is('dashboard-general-dashboard') ? 'active' : '' }}'>
        <a href="{{ route('customers.index') }}" class="nav-link">Customers</a>
      </li>
      <li class="nav-item dropdown">
        <ul class="dropdown-menu">
          <li class='{{ Request::is('dashboard-general-dashboard') ? 'active' : '' }}'>
            <a class="nav-link" href="{{ route('home') }}">General Dashboard</a>
          </li>

        </ul>
        <ul class="dropdown-menu">
          <li class=''>
            <a class="nav-link" href="{{ route('users.index') }}">Users</a>
          </li>

        </ul>

        <ul class="dropdown-menu">
          <li class=''>
            {{-- <a class="nav-link" href="{{ route('products.index') }}">Products</a> --}}
          </li>

        </ul>

        <ul class="dropdown-menu">
          <li class=''>
            <a class="nav-link" href="{{ route('categories.index') }}">Categories</a>
          </li>
        </ul>

        {{-- <ul class="dropdown-menu">
                    <li class=''>
                        <a class="nav-link" href="{{ route('customers.index') }}">Customers</a>
            </li>
        </ul> --}}
      </li>

</div>
