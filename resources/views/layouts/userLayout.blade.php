<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('./css/style.min.css') }}">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <title>
        Bookstore | @yield('title')
    </title>
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
              <a class="navbar-brand" href="{{ route('view.home') }}">Bookstore</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('view.home') ? 'active' : '' }}" aria-current="page" href="{{ route('view.home') }}">Home</a>
                  </li>

                  @auth
                  <li class="nav-item mx-lg-2">
                    <a class="btn btn-outline-danger " href="{{ route('logout') }}">Logout</a>
                  </li>
                  <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                        <img class="rounded-circle me-lg-2" src="{{ asset('images/user.jpg') }}" alt="" style="width: 40px; height: 40px;">
                        <span class="d-none d-lg-inline-flex">{{Auth::user()->name}}</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">
                        <a href="#" class="dropdown-item">My Profile</a>
                        <a href="#" class="dropdown-item">Settings</a>
                        <a href="#" class="dropdown-item">Log Out</a>
                    </div>
                </div>
                  @endauth
                  @guest
                     <li class="nav-item mx-lg-2">
                    <a class="btn btn-outline-primary {{ request()->routeIs('view.login') ? 'active' : '' }} " href="{{ route('view.login') }}">Login</a>
                  </li> 
                  <li class="nav-item mx-lg-2">
                    <a class="btn btn-outline-light {{ request()->routeIs('view.register') ? 'active' : '' }}" href="{{ route('view.register') }}">Register</a>
                  </li>  
                  @endguest
                  
                
                </ul>
              </div>
            </div>
          </nav>
    </header>
    <main >
        @yield('content')
    </main>

    {{-- script --}}
    <script src="{{ asset('./js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>