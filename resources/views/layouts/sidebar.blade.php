<?php 
$sekolah = sekolah(); 
$user = auth()->user(); 
$base = Request::segment(1); 
$sub = Request::segment(2);
?>
<aside class="main-sidebar sidebar-light-primary nav-compact nav-child-indent elevation-4">
  <!-- Brand Logo -->
  <a href="/" class="brand-link">
    <img src="{{$sekolah->getLogoHotel()}}" alt="Logo Hotel" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">{{$sekolah->nama_hotel}}</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="{{$user->getAvatar()}}" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="/profile" class="d-block">{{$user->nama}}</a>
      </div>
    </div>

    <!-- SidebarSearch Form -->
    <div class="form-inline">
      <div class="input-group" data-widget="sidebar-search">
        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-sidebar">
            <i class="fas fa-search fa-fw"></i>
          </button>
        </div>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column nav-compact nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
        <li class="nav-item @if($base == 'hotel' && in_array($sub, ['facilities', 'room-facilities', 'room-rates'])) menu-open @endif">
          <a href="#" class="nav-link  @if($base == 'hotel' && in_array($sub, ['facilities', 'room-facilities', 'room-configuration', 'room-rates'])) active @endif">
            <i class="nav-icon fas fa-building"></i>
            <p>
              Hotel
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{route('hotel.facilities')}}" class="nav-link @if($base == 'hotel' && $sub == 'facilities') active @endif">
                <i class="far fa-circle nav-icon"></i>
                <p>Hotel Facilities</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('hotel.room.facilities')}}" class="nav-link @if($base == 'hotel' && $sub == 'room-facilities') active @endif">
                <i class="far fa-circle nav-icon"></i>
                <p>Room Facilities</p>
              </a>
            </li>            
          </ul>
        </li>
        <li class="nav-item @if($base == 'room' && in_array($sub, ['info', 'statistics', 'status', 'guests', 'configuration'])) menu-open @endif">
          <a href="#" class="nav-link  @if($base == 'room' && in_array($sub, ['info', 'statistics', 'status', 'guests', 'configuration'])) active @endif">
            <i class="nav-icon fas fa-bed"></i>
            <p>
              Room
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{route('room.configuration')}}" class="nav-link @if($base == 'room' && $sub == 'configuration') active @endif">
                <i class="far fa-circle nav-icon"></i>
                <p>Room Configuration</p>
              </a>
            </li>            
            <li class="nav-item">
              <a href="{{route('room.statistics')}}" class="nav-link @if($base == 'room' && $sub == 'statistics') active @endif">
                <i class="far fa-circle nav-icon"></i>
                <p>Room Statistics</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('room.status')}}" class="nav-link @if($base == 'room' && $sub == 'status') active @endif">
                <i class="far fa-circle nav-icon"></i>
                <p>Room Status</p>
              </a>
            </li>            
          </ul>
        </li>
        <li class="nav-item @if($base == 'reservation' && in_array($sub, ['create', 'records','info', 'rates'])) menu-open @endif">
          <a href="#" class="nav-link  @if($base == 'reservation' && in_array($sub, ['create', 'records','info', 'rates'])) active @endif">
            <i class="nav-icon far fa-calendar-check"></i>
            <p>
              Reservation
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{route('reservation.rates')}}" class="nav-link @if($base == 'reservation' && $sub == 'rates') active @endif">
                <i class="far fa-circle nav-icon"></i>
                <p>Room Rates</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('reservation.info')}}" class="nav-link @if($base == 'reservation' && $sub == 'info') active @endif">
                <i class="far fa-circle nav-icon"></i>
                <p>Room Info</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('reservation.create') }}" class="nav-link @if($base == 'reservation' && $sub == 'create') active @endif">
                <i class="far fa-circle nav-icon"></i>
                <p>Reservation</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('reservation.records') }}" class="nav-link @if($base == 'reservation' && $sub == 'records') active @endif">
                <i class="far fa-circle nav-icon"></i>
                <p>Reservation Records</p>
              </a>
            </li>            
          </ul>
        </li>
        <li class="nav-item @if($base == 'reception' && in_array($sub, ['guests', 'arrivals', 'departure', 'registration', 'checkout', 'revenue'])) menu-open @endif">
          <a href="#" class="nav-link  @if($base == 'reception' && in_array($sub, ['guests', 'arrivals', 'departure', 'registration', 'checkout', 'revenue'])) active @endif">
            <i class="nav-icon fas fa-concierge-bell"></i>
            <p>
              Registration
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{route('reception.guests')}}" class="nav-link @if($base == 'reception' && $sub == 'guests') active @endif">
                <i class="far fa-circle nav-icon"></i>
                <p>Guest Info</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('reception.arrivals')}}" class="nav-link @if($base == 'reception' && $sub == 'arrivals') active @endif">
                <i class="far fa-circle nav-icon"></i>
                <p>Expected Arrivals</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('reception.departure')}}" class="nav-link @if($base == 'reception' && $sub == 'departure') active @endif">
                <i class="far fa-circle nav-icon"></i>
                <p>Expected Departure</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('reception.registration')}}" class="nav-link @if($base == 'reception' && $sub == 'registration') active @endif">
                <i class="far fa-circle nav-icon"></i>
                <p>Registration</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('reception.checkout')}}" class="nav-link @if($base == 'reception' && $sub == 'checkout') active @endif">
                <i class="far fa-circle nav-icon"></i>
                <p>Checking Out</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('reception.revenue')}}" class="nav-link @if($base == 'reception' && $sub == 'revenue') active @endif">
                <i class="far fa-circle nav-icon"></i>
                <p>Room Revenue</p>
              </a>
            </li>     
          </ul>
        </li>
        @if(auth()->user()->role == 'guru')
        <li class="nav-item">
          <a href="{{route('report')}}" class="nav-link @if($base == 'report') active @endif">
            <i class="nav-icon fas fa-user-graduate"></i>
            <p>Student Report</p>
          </a>
        </li>
        @endif
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>