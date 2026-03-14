<aside class="main-sidebar sidebar-dark-primary elevation-4">

    <a href="/admin/dashboard" class="brand-link">
        <span class="brand-text">Admin Panel</span>
    </a>

    <div class="sidebar">

        <nav class="mt-2">

            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview">

                <li class="nav-item">
                    <a href="/admin/dashboard"
                        class="nav-link {{ request()->is('admin/dashboard') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>


                @if(in_array(auth('admin')->user()->role,['admin','editor']))
                <li class="nav-item">
                    <a href="/admin/sliders"
                        class="nav-link {{ request()->is('admin/sliders*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-images"></i>
                        <p>Sliders</p>
                    </a>
                </li>
                @endif


                @if(auth('admin')->user()->role == 'admin')
                <li class="nav-item">
                    <a href="/admin/categories"
                        class="nav-link {{ request()->is('admin/categories*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-list"></i>
                        <p>Categories</p>
                    </a>
                </li>
                @endif


                @if(auth('admin')->user()->role == 'admin')
                <li class="nav-item">
                    <a href="/admin/subcategories"
                        class="nav-link {{ request()->is('admin/subcategories*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-layer-group"></i>
                        <p>Subcategories</p>
                    </a>
                </li>
                @endif


                @if(in_array(auth('admin')->user()->role,['admin','manager']))
                <li class="nav-item">
                    <a href="/admin/products"
                        class="nav-link {{ request()->is('admin/products*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-box"></i>
                        <p>Products</p>
                    </a>
                </li>
                @endif


                @if(in_array(auth('admin')->user()->role,['admin','manager']))
                <li class="nav-item">
                    <a href="/admin/orders"
                        class="nav-link {{ request()->is('admin/orders*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-shopping-cart"></i>
                        <p>Orders</p>
                    </a>
                </li>
                @endif


                @if(in_array(auth('admin')->user()->role,['admin','editor']))
                <li class="nav-item">
                    <a href="/admin/settings"
                        class="nav-link {{ request()->is('admin/settings*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-cog"></i>
                        <p>Contact</p>
                    </a>
                </li>
                @endif

                @if(auth('admin')->user()->role == 'admin')
                <li class="nav-item">
                    <a href="/admin/users"
                        class="nav-link {{ request()->is('admin/users*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-users"></i>
                        <p>Manage Users</p>
                    </a>
                </li>
                @endif

            </ul>

        </nav>

    </div>

</aside>