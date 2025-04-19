{{-- <div class="container py-4">


  
    <nav class="mb-3">
        <a href="{{ route('admin.buses') }}" class="btn btn-primary">Bus</a>
        <a href="{{ route('admin.bookings') }}" class="btn btn-primary">Booking</a>
    </nav>

</div> --}}

<div class="sidebar" data-background-color="dark">
    <div class="sidebar-logo">
      <!-- Logo Header -->
      <div class="logo-header" data-background-color="dark">
        <a href="{{ route('dashboard') }}" class="logo">
          <img
            src="{{ asset('assets/img/kaiadmin/logo_light.svg') }}"
            alt="navbar brand"
            class="navbar-brand"
            height="20"
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
          <li class="nav-item active">
            <a

              href="{{ route('dashboard') }}"
              class="collapsed"
              aria-expanded="false"
            >
              <i class="fas fa-home"></i>
              <p>Dashboard</p>
             
            </a>
           
          </li>
          <li class="nav-section">
            <span class="sidebar-mini-icon">
              <i class="fa fa-ellipsis-h"></i>
            </span>
            <h4 class="text-section">Menu</h4>
          </li>
          <li class="nav-item">
            <a href="{{ route('admin.buses') }}">
              <i class="fas fa-layer-group"></i>
              <p>Bus</p>
             
            </a>
            {{-- <li class="nav-item">
              <a href="{{ route('admin.buses.seats', $bus->id) }}">
                <i class="fas fa-layer-group"></i>
                <p>Bus seat</p>
               
              </a>
            
          </li> --}}
          <li class="nav-item">
            <a href="{{ route('admin.bookings') }}">
              <i class="fas fa-th-list"></i>
              <p>Booking</p>
            
            </a>
            
          </li>
        </ul>
      </div>
    </div>
  </div>