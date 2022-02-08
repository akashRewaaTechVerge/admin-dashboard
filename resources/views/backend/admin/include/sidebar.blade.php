<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <!-- Sidebar Menu -->
    <?php  $user = Auth::user(); if($user != ""){   if($user->image != ""){?>
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('admin/img/'.Auth::user()->image)}}" class="img-circle elevation-2" style="width:60px ; height:50px" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{Auth::user()->name}}</a>
        </div>
      <?php } else{ ?>
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('admin/img/' . 'avtaar.png' ) }}" class="img-circle elevation-2" width="50px" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{Auth::user()->name}}</a>
        </div>
        <?php } ?>
    </div>
    <?php } ?>
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
        <li class="nav-item">
          <a href="/" class="nav-link {{ request()->is('/') ? 'active' : '' }}">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Analytics
            </p>
          </a>
        </li>
        <!-- =---------------------------- [ For Org ] ------------------------------= -->
        <li class="nav-item {{ (request()->is('org*')) ||  (request()->is('org*')) ||   (request()->is('addRole*')) || (request()->is('permission*'))  ? 'active menu-open' : '' }} " >          
          <a href="" class="nav-link {{ (request()->is('org*')) ||  (request()->is('org*')) ||  (request()->is('addRole*'))  ||  (request()->is('permission*')) ? 'active' : '' }}">
              <i class="fa fa-globe"></i>
              <p> Org  <i class="right fas fa-angle-left"></i> </p>
          </a>
          <ul class="nav nav-treeview">
              @can('org')  
              <li class="nav-item">
                <a href="{{route('org')}}" class="nav-link {{ (request()->is('org*')) ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>org</p>
                </a>
              </li>
              @endcan  
              @can('addRole') 
              <li class="nav-item">
                <a href="{{ route('addRole')}}" class="nav-link {{ (request()->is('addRole*')) ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Role List</p>
                </a>
              </li> 
              @endcan
              @can('permission')
                <li class="nav-item">
                  <a href="{{ route('permission')}}" class="nav-link {{ (request()->is('permission*')) ? 'active' : '' }}">
                      <i class="far fa-circle nav-icon"></i>
                      <p>permission</p>
                  </a>
                </li>  
              @endcan
          </ul>
        </li>  
        <!-- For Demo -->
         @can('demo') 
            <li class="nav-item {{ (request()->is('demo*')) ? 'active menu-open' : '' }} " >          
             <a href="{{route('demo')}}" class="nav-link {{ (request()->is('demo*')) ||  (request()->is( 'demo*')) ? 'active' : '' }}">
                  <i class="fa fa-globe"></i>
                  <p> Demo </p>
              </a>
            </li>  
            @endcan
            @can('test') 
            <li class="nav-item {{ (request()->is('test*')) ? 'active menu-open' : '' }} " >          
              <a href="{{route('test')}}" class="nav-link {{ (request()->is('test*')) ||  (request()->is('test*')) ? 'active' : '' }}">
                  <i class="fa fa-globe"></i>
                  <p> Test </p>
              </a>
            </li>  
          @endcan
          @can('tester') 
            <li class="nav-item {{ (request()->is('test*')) ? 'active menu-open' : '' }} " >          
              <a href="{{route('tester')}}" class="nav-link {{ (request()->is('tester*')) ||  (request()->is('tester*')) ? 'active' : '' }}">
                  <i class="fa fa-globe"></i>
                  <p> Tester </p>
              </a>
            </li>  
          @endcan
          @can('api') 
            <li class="nav-item {{ (request()->is('api*')) ? 'active menu-open' : '' }} " >          
              <a href="{{route('api')}}" class="nav-link {{ (request()->is('api*')) ||  (request()->is('api*')) ? 'active' : '' }}">
                  <i class="fa fa-globe"></i>
                  <p> Api </p>
              </a>
            </li>  
          @endcan

          @can('bikes') 
            <li class="nav-item {{ (request()->is('bikes*')) ? 'active menu-open' : '' }} " >          
              <a href="{{route('bikes')}}" class="nav-link {{ (request()->is('bikes*')) ||  (request()->is('bikes*')) ? 'active' : '' }}">
                  <i class="fa fa-globe"></i>
                  <p> Bikes </p>
              </a>
            </li>  
          @endcan
          @can('editor') 
            <li class="nav-item {{ (request()->is('editor*')) ? 'active menu-open' : '' }} " >          
              <a href="{{route('editor')}}" class="nav-link {{ (request()->is('editor*')) ||  (request()->is('editor*')) ? 'active' : '' }}">
                  <i class="fa fa-globe"></i>
                  <p> Editor </p>
              </a>
            </li>  
          @endcan
          @can('geofence') 
            <li class="nav-item {{ (request()->is('geofence*')) ? 'active menu-open' : '' }} " >          
              <a href="{{route('geofence')}}" class="nav-link {{ (request()->is('geofence*')) ||  (request()->is('geofence*')) ? 'active' : '' }}">
                  <i class="fa fa-globe"></i>
                  <p> GeoFence </p>
              </a>
            </li>  
          @endcan


      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>
@yield('sidebar')