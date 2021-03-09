<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>@yield('title', 'Login | Assessment Jendela 360')</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item {{ request()->is('/') ? "active":"" }}">
              <a class="nav-link" href="/">Dashboard</a>
            </li>
            <li class="nav-item {{ request()->is('cars*') ? "active":"" }}">
              <a class="nav-link" href="{{ route('cars.index') }}">Mobil</a>
            </li>
            <li class="nav-item {{ request()->is('car-selling*') ? "active":"" }}">
              <a class="nav-link" href="{{ route('car-selling.index') }}">Penjualan</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('auth.logout') }}">Logout</a>
            </li>
          </ul>
        </div>
    </nav>
    @yield('content')

    <script src="{{ asset('js/app.js') }}"></script>
    @yield('scripts')
</body>
</html>
