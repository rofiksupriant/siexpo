<aside class="main-sidebar sidebar-dark-primary elevation-4 position-fixed">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{asset('lte/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('lte/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="{{ url('/admin', []) }}" class="nav-link {{$menu == 'Dashboard' ? 'active' : ''}}">
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
                <a href="{{ url('/admin/processor') }}" class="nav-link {{$menu == 'Processor' ? 'active' : ''}}">
                  <p>Processor</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('/admin/motherboard') }}" class="nav-link {{$menu == 'Motherboard' ? 'active' : ''}}">
                  <p>Motherboard</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('/admin/ram') }}" class="nav-link {{$menu == 'RAM' ? 'active' : ''}}">
                  <p>RAM</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('/admin/ssd') }}" class="nav-link {{$menu == 'SSD' ? 'active' : ''}}">
                  <p>SSD</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('/admin/hdd') }}" class="nav-link {{$menu == 'HDD' ? 'active' : ''}}">
                  <p>HDD</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>