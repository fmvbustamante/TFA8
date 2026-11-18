<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A four-page Laravel point-of-sale foundations project.">
    <title>@yield('title', 'SimplePOS') | SimplePOS Laravel</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <header class="site-header">
        <div class="nav-wrap">
            <a class="brand" href="{{ route('home') }}">
                <span class="brand-mark">S</span>
                <span>SimplePOS</span>
            </a>
            <nav class="nav-links" aria-label="Main navigation">
                <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">Home</a>
                <a class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}" href="{{ route('about') }}">About</a>
                <a class="nav-link {{ request()->routeIs('customers.*') ? 'active' : '' }}" href="{{ route('customers.index') }}">Customers</a>
                <a class="nav-link {{ request()->routeIs('users.*') ? 'active' : '' }}" href="{{ route('users.index') }}">Users</a>
                @auth<form method="POST" action="{{ route('logout') }}">@csrf<button class="nav-link" type="submit">Log out</button></form>@else<a class="nav-link" href="{{ route('login') }}">Log in</a>@endauth
            </nav>
        </div>
    </header>

    <main>
        @yield('content')
    </main>

    <footer class="site-footer">
        <div class="footer-wrap">
            <span>SimplePOS Laravel · IT0049 TFA5</span>
            <span>Laravel MVC foundations activity</span>
        </div>
    </footer>
</body>
</html>
