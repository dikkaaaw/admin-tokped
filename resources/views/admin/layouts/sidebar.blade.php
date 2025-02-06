 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
     <!-- Brand Logo -->
     <a href="/" class="brand-link text-decoration-none">
         <img src="{{ asset('dist/assets/img/logo/logo.jpg') }}" alt="Logo" class=""
             style="opacity: 0.8; max-width: 40px;">
         <span class="brand-text fw-light ms-2">Dewata Melon</span>
     </a>

     <!-- Sidebar -->
     <div class="sidebar">
         <div class="pb-3 mt-3 mb-3 user-panel d-flex">
             <div class="image">
                 <img src="https://ui-avatars.com/api/?name={{ Auth::user()->name }}&background=random"
                     class="img-circle" alt="User Image">
             </div>
             <div class="info">
                 <span class="text-white d-block">{{ Auth::user()->name }}</span>
             </div>
         </div>

         <!-- SidebarSearch Form -->
         <div class="form-inline">
             <div class="input-group" data-widget="sidebar-search">
                 <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                     aria-label="Search">
                 <div class="input-group-append">
                     <button class="btn btn-sidebar">
                         <i class="fas fa-search fa-fw"></i>
                     </button>
                 </div>
             </div>
         </div>

         <!-- Sidebar Menu -->
         <nav class="mt-2">
             <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                 data-accordion="false">
                 <li class="nav-header">DASHBOARD</li>
                 <li class="nav-item">
                     <a href="{{ URL('admin/dashboard') }}" class="nav-link">
                         <i class="nav-icon fas fa-home"></i>
                         <p>
                             Dashboard
                         </p>
                     </a>
                 </li>

                 <li class="nav-header">PRODUCTS</li>
                 <li class="nav-item">
                     <a href="#" class="nav-link">
                         <i class="nav-icon fas fa-box"></i>
                         <p>
                             Product
                             <i class="right fas fa-angle-left"></i>
                         </p>
                     </a>
                     <ul class="nav nav-treeview">
                         <li class="nav-item">
                             <a href="{{ URL('admin/product') }}" class="nav-link">
                                 <i class="fas fa-list nav-icon"></i>
                                 <p>Data Product</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="{{ URL('admin/product/add') }}" class="nav-link">
                                 <i class="fas fa-plus nav-icon"></i>
                                 <p>Tambah Product</p>
                             </a>
                         </li>
                     </ul>
                 </li>

                 <li class="nav-header">USERS</li>
                 <li class="nav-item">
                     <a href="{{ URL('admin/user') }}" class="nav-link">
                         <i class="nav-icon fas fa-users"></i>
                         <p>
                             Data User
                         </p>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a href="{{ URL('admin/order') }}" class="nav-link">
                         <i class="nav-icon fas fa-box"></i>
                         <p>
                             Data Order
                         </p>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a href="{{ URL('admin/transaction') }}" class="nav-link">
                         <i class="nav-icon fas fa-money-bill"></i>
                         <p>
                             Transaction
                         </p>
                     </a>
                 </li>
                 {{-- logout --}}
                 <li class="nav-item">
                     <a href="#" class="nav-link"
                         onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                         <i class="nav-icon fas fa-sign-out-alt"></i>
                         <p>Logout</p>
                     </a>
                     <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                         @csrf
                     </form>
                 </li>
             </ul>
         </nav>
         <!-- /.sidebar-menu -->
     </div>
     <!-- /.sidebar -->
 </aside>
