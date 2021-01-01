<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{asset('images/siexpo-logo.jpeg')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{ url('/admin') }}" class="nav-link {{$menu == 'Dashboard' ? 'active' : ''}}">
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item {{$parentMenu == 'Master Data' ? 'menu-is-opening menu-open' : ''}} ">
            <a href="#" class="nav-link {{$parentMenu == 'Master Data' ? 'active' : ''}}">
              <p>
                Master Data
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview {{$parentMenu == 'Master Data' ? 'style="display: block;"' : ''}}" >
              <li class="nav-item">
                <a href="{{ route('brand') }}" class="nav-link pl-4 {{$menu == 'Brand' ? 'active' : ''}}">
                  <p>Brand</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('processor') }}" class="nav-link pl-4 {{$menu == 'Processor' ? 'active' : ''}}">
                  <p>Processor</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('motherboard') }}" class="nav-link pl-4 {{$menu == 'Motherboard' ? 'active' : ''}}">
                  <p>Motherboard</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('ram') }}" class="nav-link pl-4 {{$menu == 'RAM' ? 'active' : ''}}">
                  <p>RAM</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('ssd')}}" class="nav-link pl-4 {{$menu == 'SSD' ? 'active' : ''}}">
                  <p>SSD</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('hdd')}}" class="nav-link pl-4 {{$menu == 'HDD' ? 'active' : ''}}">
                  <p>HDD</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('keyboard')}}" class="nav-link pl-4 {{$menu == 'Keyboard' ? 'active' : ''}}">
                  <p>Keyboard</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('monitor')}}" class="nav-link pl-4 {{$menu == 'Monitor' ? 'active' : ''}}">
                  <p>Monitor</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('mouse')}}" class="nav-link pl-4 {{$menu == 'Mouse' ? 'active' : ''}}">
                  <p>Mouse</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('mousePad')}}" class="nav-link pl-4 {{$menu == 'Mouse Pad' ? 'active' : ''}}">
                  <p>Mouse Pad</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('vga')}}" class="nav-link pl-4 {{$menu == 'VGA' ? 'active' : ''}}">
                  <p>VGA</p>
                </a>
              </li>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>