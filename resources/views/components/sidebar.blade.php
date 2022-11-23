 <!-- Sidebar Start -->
 <div class="sidebar pe-4 pb-3">
     <nav class="navbar bg-secondary navbar-dark">
         <a href="index.html" class="navbar-brand mx-4 mb-3">
             <h3 class="text-primary"><i class="bx bx-cube me-2"></i>Bookstore</h3>
         </a>
         <div class="d-flex align-items-center ms-4 mb-4">
             <div class="position-relative">
                 <img class="rounded-circle" src="{{ asset('images/user.jpg') }}" alt=""
                     style="width: 40px; height: 40px;">
                 <div
                     class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1">
                 </div>
             </div>
             <div class="ms-3">
                 <h6 class="mb-0">{{ Auth::user()->name }}</h6>
                 <span>Admin</span>
             </div>
         </div>
         <div class="navbar-nav w-100">
             <a href="{{ route('view.admin.home') }}"
                 class="nav-item nav-link {{ request()->routeIs('view.admin.home') ? 'active' : '' }}"><i
                     class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
             <div class="nav-item dropdown">
                 <a href="{{ route('books.index') }}"
                     class="nav-link dropdown-toggle {{ request()->routeIs('books.index') || request()->routeIs('books.create') ? 'active' : '' }}"
                     data-bs-toggle="dropdown"><i class="fa fa-book me-2"></i>Books</a>
                 <div class="dropdown-menu bg-transparent border-0">
                     <a href="{{ route('books.index') }}"
                         class="dropdown-item {{ request()->routeIs('books.index') ? 'active' : '' }}"> <i
                             class="fa fa-list me-2"></i>
                         Book List</a>
                     <a href="{{ route('books.create') }}"
                         class="dropdown-item {{ request()->routeIs('books.create') ? 'active' : '' }}"> <i
                             class="fa fa-plus me-2"></i>
                         Create
                         Book</a>

                 </div>
             </div>
             <a href="widget.html" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Widgets</a>
             <a href="form.html" class="nav-item nav-link"><i class="fa fa-keyboard me-2"></i>Forms</a>
             <a href="table.html" class="nav-item nav-link"><i class="fa fa-table me-2"></i>Tables</a>
             <a href="chart.html" class="nav-item nav-link"><i class="fa fa-chart-bar me-2"></i>Charts</a>
             <div class="nav-item dropdown">
                 <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i
                         class="far fa-file-alt me-2"></i>Pages</a>
                 <div class="dropdown-menu bg-transparent border-0">
                     <a href="signin.html" class="dropdown-item">Sign In</a>
                     <a href="signup.html" class="dropdown-item">Sign Up</a>
                     <a href="404.html" class="dropdown-item">404 Error</a>
                     <a href="blank.html" class="dropdown-item">Blank Page</a>
                 </div>
             </div>
         </div>
     </nav>
 </div>
 <!-- Sidebar End -->
