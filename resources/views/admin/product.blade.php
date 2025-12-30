<x-layout>

<div class="container py-5" style="background-color: #1c1c1c; min-height: 100vh;">

    <!-- Page Title -->
    <div class="text-center mb-5">
        <h1 class="fw-bold text-white">Product Management</h1>
        <p class="text-white-50">Create, manage, and restore your products easily</p>
    </div>

    <!-- Success Message -->
    @if(session('success'))
        <div class="alert alert-success text-center">
            {{ session('success') }}
        </div>
    @endif

    <div class="row g-4">

        <!-- Existing Products -->
        <div class="col-md-6">
            <div class="card shadow-lg border-0 rounded-4 h-100 bg-dark text-white">
                <div class="card-body p-4">
                    <h4 class="fw-semibold mb-4 text-white">Existing Products</h4>

                    @if($product->count())
                        <ul class="list-group list-group-flush bg-dark">
                            @foreach ($product as $p)
                                <li class="list-group-item d-flex justify-content-between align-items-center bg-dark text-white border-0">
                                    <span class="fw-medium">{{ $p->name }}</span>

                                    <div class="d-flex gap-2">
                                        <!-- Edit Button -->
                                        <a href="{{ route('edit', $p->id) }}" 
                                           class="btn btn-sm btn-outline-primary rounded-pill px-3 shadow-sm d-flex align-items-center gap-1">
                                            <i class="bi bi-pencil-fill"></i> Edit
                                        </a>

                                        <!-- Delete Button -->
                                        <form action="{{ route('DeleteProduct', $p->id) }}" method="POST">
                                            @csrf
                                            
                                            <button type="submit" 
                                                    class="btn btn-sm btn-outline-danger rounded-pill px-3 shadow-sm d-flex align-items-center gap-1">
                                                <i class="bi bi-trash-fill"></i> Delete
                                            </button>
                                        </form>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <p class="text-white-50">No products found.</p>
                    @endif
                </div>
            </div>
        </div>

        <!-- Add Product Form -->
        <div class="col-md-6">
            <div class="card shadow-lg border-0 rounded-4 h-100 bg-dark text-white">
                <div class="card-body p-4">
                    <h4 class="fw-semibold mb-4 text-white">Add New Product</h4>

                    <form action="{{ route('productsAction') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label fw-medium text-white">Name</label>
                            <input type="text" name="name" class="form-control form-control-lg bg-secondary text-white border-0" placeholder="Enter product name" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-medium text-white">Info</label>
                            <input type="text" name="info" class="form-control form-control-lg bg-secondary text-white border-0" placeholder="Enter product info" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-medium text-white">Description</label>
                            <input type="text" name="description" class="form-control form-control-lg bg-secondary text-white border-0" placeholder="Enter product description" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-medium text-white">Price</label>
                            <input type="number" name="price" class="form-control form-control-lg bg-secondary text-white border-0" placeholder="Enter product price" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-medium text-white">Quantity</label>
                            <input type="number" name="quantity" class="form-control form-control-lg bg-secondary text-white border-0" placeholder="Enter product quantity" required>
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-medium text-white">Image</label>
                            <input type="file" name="image" class="form-control bg-secondary text-white border-0" required>
                            <small class="text-white-50">Upload product image (PNG, JPG)</small>
                        </div>

                        <button type="submit" class="btn btn-primary btn-lg rounded-pill px-5 shadow-sm">
                            Add Product
                        </button>
                    </form>

                </div>
            </div>
        </div>

    </div>

    <!-- Deleted Products -->
    @if($deletedProduct->count())
    <div class="mt-5">
        <h4 class="fw-semibold mb-3 text-white">Deleted Products</h4>
        <div class="row g-3">
            @foreach($deletedProduct as $dp)
                <div class="col-md-4">
                    <div class="card border-0 shadow-sm rounded-4 p-3 h-100 d-flex flex-column justify-content-between bg-dark text-white">
                        <h5 class="fw-medium">{{ $dp->name }}</h5>
                        <form action="{{ route('RestoreProduct', $dp->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-success btn-sm rounded-pill mt-2 w-100 d-flex align-items-center justify-content-center gap-1">
                                <i class="bi bi-arrow-counterclockwise"></i> Restore
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    @endif
@if(session('error'))
    <p style="color:red">{{session('error')}}</p>
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
