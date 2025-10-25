<!-- Sidebar -->
<div class="sidebar" data-background-color="white">
    <div class="sidebar-logo">
        <!-- Logo Header -->
        <div class="logo-header" data-background-color="blue">
            <a href="index.html" class="logo">
              <img
                src="{{ asset('images/carental-logo.png') }}"
                alt="navbar brand"
                class="navbar-brand"
                height="46"
              />
            </a>
        <div class="nav-toggle">
            <button class="btn btn-toggle toggle-sidebar">
            <i class="gg-menu-right"></i>
            </button>
            <button class="btn btn-toggle sidenav-toggler">
            <i class="gg-menu-left"></i>
            </button>
        </div>
        <button class="topbar-toggler more">
            <i class="gg-more-vertical-alt"></i>
        </button>
        </div>
        <!-- End Logo Header -->
    </div>
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <ul class="nav nav-secondary">
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}" class="collapsed" aria-expanded="false">
                        <i class="fas fa-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                <!-- For Admin only can see -->
                @if(Auth::check() && Auth::user()->role == 2)
                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">Managements</h4>
                </li>
                <li class="nav-item">
                    <a href="{{ route('users.index') }}" class="collapsed" aria-expanded="false">
                        <i class="fas fa-user"></i>
                        <p>Users</p>
                        <!-- Admin, Staff, Customer -->
                    </a>
                </li>
                @endif
                <!-- End -->

                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">Cars Management</h4>
                </li>
                <li class="nav-item">
                    <a href="{{ route('cars.index') }}" class="collapsed" aria-expanded="false">
                        <i class="fas fa-car"></i>
                        <p>Cars</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('categories.index') }}" class="collapsed" aria-expanded="false">
                        <i class="fas fa-list"></i>
                        <p>Categories</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('maintenances.index') }}" class="collapsed" aria-expanded="false">
                        <i class="fas fa-wrench"></i>
                        <p>Maintenance</p>
                    </a>
                </li>
                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">Orders Management</h4>
                </li>
                <li class="nav-item">
                    <a href="{{ route('bookings.index') }}" class="collapsed" aria-expanded="false">
                        <i class="fas fa-book"></i>
                        <p>Rentals</p>
                    </a>
                </li>
                <!-- <li class="nav-item">
                    <a href="#" class="collapsed" aria-expanded="false">
                        <i class="fas fa-clipboard-list"></i>
                        <p>Reservation</p>
                    </a>
                </li> -->
                <li class="nav-item">
                    <a href="{{ route('payments.index') }}" class="collapsed" aria-expanded="false">
                        <i class="fas fa-dollar-sign"></i>
                        <p>Payments</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- End Sidebar -->