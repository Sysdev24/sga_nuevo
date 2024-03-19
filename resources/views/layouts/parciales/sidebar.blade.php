
<aside class="main-sidebar sidebar-light-primary elevation-1">

    {{-- Brand Logo --}}
    <a href="#!" class="brand-link navbar-primary">
      <img src="/img/saren.jpg" alt="PAGO EN LINEA" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light text-white font-weight-bold" style="font-family: 'Open Sans',sans-serif;font-size: 14px;">PAGO EN LÍNEA</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <!-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
       <div class="row">
         <div class="image">
           <img src="/img/profile.png" class="img-circle elevation-2" alt="User Image">
         </div>
           <a href="#" class="text-capitalize d-block">
           </a>
      </div>
     </div> -->
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

          
          <li class="nav-item active">
              <a href="{{ url('home') }}" class="nav-link"><i class="nav-icon far fa-credit-card"></i>
                  <p>Pagar Planilla (PUB)</p>
              </a>
          </li>

            {{-- <li class="nav-item">
              <a href="#" class="nav-link"><i class="nav-icon fas fa-wrench"></i>
                <p>Configuración<i class="nav-icon fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">

                <li class="nav-item">
                  <a href="{{ url('roles') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Roles</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ url('usuario') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Usuarios</p>
                  </a>
                </li>
              </ul>
            </li> --}}
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
