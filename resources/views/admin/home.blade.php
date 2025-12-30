<x-layout>

<div class="container py-5" style="background-color: #1c1c1c; min-height: 100vh;">

    <!-- Admin Title -->
    <div class="text-center mb-5">
        <h1 class="fw-bold text-white" style="font-size: 2.5rem;">Admin Dashboard</h1>
        <p class="text-white-50" style="font-size: 1.1rem;">
            Manage your application settings and users
        </p>
    </div>

    <!-- Cards -->
    <div class="row justify-content-center g-4">

        <!-- User Management -->
        <div class="col-md-4">
            <div class="card shadow-lg border-0 rounded-4 h-100 bg-dark text-white">
                <div class="card-body text-center p-4">
                    <img src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png"
                         width="90" class="mb-3 opacity-75">

                    <h3 class="fw-semibold mb-3">User Management</h3>
                    <p class="text-white-50 mb-4">
                        Control user roles, permissions, and admin powers.
                    </p>

                    <a href="{{ route('ManageUserPage') }}"
                       class="btn btn-primary btn-lg px-5 rounded-pill shadow-sm">
                        Manage Users
                    </a>
                </div>
            </div>
        </div>

        <!-- Tag Management -->
        <div class="col-md-4">
            <div class="card shadow-lg border-0 rounded-4 h-100 bg-dark text-white">
                <div class="card-body text-center p-4">
                    <img src="https://cdn-icons-png.flaticon.com/512/747/747376.png"
                         width="90" class="mb-3 opacity-75">

                    <h3 class="fw-semibold mb-3">Tag Management</h3>
                    <p class="text-white-50 mb-4">
                        Create, edit, and organize tags.
                    </p>

                    <a href="{{ route('tagsPage') }}"
                       class="btn btn-success btn-lg px-5 rounded-pill shadow-sm">
                        Manage Tags
                    </a>
                </div>
            </div>
        </div>

        <!-- Product Management -->
        <div class="col-md-4">
            <div class="card shadow-lg border-0 rounded-4 h-100 bg-dark text-white">
                <div class="card-body text-center p-4">
                    <img src="https://cdn-icons-png.flaticon.com/512/3081/3081559.png"
                         width="90" class="mb-3 opacity-75">

                    <h3 class="fw-semibold mb-3">Product Management</h3>
                    <p class="text-white-50 mb-4">
                        Add, update, and manage products.
                    </p>

                    <a href="{{route('productPage')}}"
                       class="btn btn-warning btn-lg px-5 rounded-pill shadow-sm text-white">
                        Manage Products
                    </a>
                </div>
            </div>
        </div>

        <!-- Carousel Management -->
        <div class="col-md-4">
            <div class="card shadow-lg border-0 rounded-4 h-100 bg-dark text-white">
                <div class="card-body text-center p-4">
                    <img src="https://img.icons8.com/ios7/1200/carousell.jpg"
                         width="90" class="mb-3 opacity-75">

                    <h3 class="fw-semibold mb-3">Carousel Management</h3>
                    <p class="text-white-50 mb-4">
                        Add, update, and manage carousel.
                    </p>

                    <a href="{{route('CarouselPage')}}"
                       class="btn btn-danger btn-lg px-5 rounded-pill shadow-sm text-white">
                        Manage Carousel
                    </a>
                </div>
            </div>
        </div>

    </div>

</div>

<!-- Optional Custom Styles -->
<style>
    .card:hover {
        transform: translateY(-5px);
        transition: 0.3s;
    }
</style>

</x-layout>
