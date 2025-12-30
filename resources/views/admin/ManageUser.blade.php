<x-layout>

<div class="container py-5" style="background-color: #1c1c1c; min-height: 100vh;">

    <!-- Page Title -->
    <div class="text-center mb-5">
        <h1 class="fw-bold text-white" style="font-size: 2.2rem;">User Management</h1>
        <p class="text-white-50">Manage active and deleted users</p>
    </div>

    <!-- Active Users -->
    <div class="mb-5">
        <h3 class="mb-3 text-white">Active Users</h3>
        <div class="row g-3">
            @foreach ($user as $u)
                <div class="col-md-6">
                    <div class="card shadow-lg rounded-4 p-3 d-flex justify-content-between align-items-center bg-dark text-white">
                        <div class="d-flex justify-content-between align-items-center w-100">
                            <span class="fw-semibold">{{ $u->name }}</span>
                            <div class="d-flex gap-2">
                                <!-- Role Toggle -->
                                <form action="{{ route('manageAction', $u->id) }}" method="POST" class="mb-0">
                                    @csrf
                                    <button class="btn btn-sm 
                                        @if($u->role == 'admin') btn-danger @else btn-primary @endif">
                                        @if($u->role == 'admin') Revoke Admin @else Make Admin @endif
                                    </button>
                                </form>

                                <!-- Delete User -->
                                <form action="{{ route('DeleteUser', $u->id) }}" method="POST" class="mb-0">
                                    @csrf
                                    <button class="btn btn-outline-danger btn-sm">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Deleted Users -->
    <div class="mt-5">
        <h3 class="mb-3 text-white">Deleted Users</h3>
        <div class="row g-3">
            @foreach($deleteUsers as $delete)
                <div class="col-md-6">
                    <div class="card shadow-lg rounded-4 p-3 d-flex justify-content-between align-items-center bg-dark text-white">
                        <div class="d-flex justify-content-between align-items-center w-100">
                            <span class="fw-semibold">{{ $delete->name }}</span>
                            <form action="{{ route('restoreUser', $delete->id) }}" method="POST" class="mb-0">
                                @csrf
                                <button class="btn btn-success btn-sm">Restore</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Success Message -->
    @if(session('success'))
        <div class="alert alert-success mt-4 text-center">
            {{ session('success') }}
        </div>
    @endif

</div>

<!-- Optional Custom Styles -->
<style>
    .card:hover {
        transform: translateY(-5px);
        transition: 0.3s;
    }
    .alert-success {
        background-color: #28a745;
        color: white;
        border: none;
        font-weight: 500;
    }
</style>

</x-layout>
