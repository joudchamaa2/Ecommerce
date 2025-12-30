<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
    <div class="container-fluid">
        <!-- Brand -->
        <a class="navbar-brand fw-bold fs-4" href="{{ route('home') }}">Online Shop</a>

        <!-- Toggler for mobile -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent" 
            aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarContent">
            <!-- Left: Links -->
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 align-items-center">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('home') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('productsPage') }}">Products</a>
                </li>
                
                <!-- Search form after links -->
                <li class="nav-item ms-3" method="GET" action="{{ route('search') }}">
                    <form class="d-flex">
                        <input class="form-control form-control-sm" id="keyword" type="search" placeholder="Search" aria-label="Search" style="width: 200px;">
                        <button class="btn btn-outline-light btn-sm ms-2" type="submit">Search</button>
                    </form>
                </li>
            </ul>

            <!-- Right: Auth Buttons -->
            <div class="d-flex align-items-center gap-2">
                @guest
                    <a class="btn btn-outline-light btn-sm" href="{{ route('loginPage') }}">Signin</a>
                    <a class="btn btn-light btn-sm text-dark" href="{{ route('registerPage') }}">Signup</a>
                @endguest

                @auth
                    <span class="text-white fw-semibold me-2">Hello, {{ Auth::user()->name }}!</span>
                    <a class="btn btn-outline-light btn-sm" href="{{ route('logout') }}">Logout</a>
                    @if(Auth::user()->role == 'admin')
                        <a class="btn btn-light btn-sm text-dark" href="{{ route('adminPage') }}">Admin</a>
                    @endif
                @endauth
            </div>
        </div>
    </div>
</nav>

<!-- Optional Styles -->
<style>
    .navbar-dark .nav-link {
        color: rgba(255,255,255,0.8);
        transition: color 0.3s;
    }
    .navbar-dark .nav-link:hover {
        color: #ffffff;
    }
    .btn-light.text-dark:hover {
        background-color: #f8f9fa;
        color: #000;
    }
    .btn-outline-light:hover {
        background-color: rgba(255,255,255,0.1);
    }
</style>
