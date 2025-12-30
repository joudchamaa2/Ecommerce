<x-layout>

<style>
    body {
        background-color: #1c1c1c;
        color: #f1f1f1;
    }

    .dark-card {
        background-color: #262626;
        color: #f1f1f1;
    }

    .dark-card .form-control,
    .dark-card select {
        background-color: #1c1c1c;
        color: #fff;
        border: 1px solid #444;
    }

    .dark-card .form-control::placeholder {
        color: #aaa;
    }

    .dark-card .form-control:focus,
    .dark-card select:focus {
        background-color: #1c1c1c;
        color: #fff;
        border-color: #0d6efd;
        box-shadow: none;
    }

    .tag-item {
        background-color: #1c1c1c;
        border: 1px solid #333;
        border-radius: 8px;
        padding: 6px 10px;
        margin-bottom: 8px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
</style>

<div class="container py-5 d-flex justify-content-center">
    <div class="col-md-6">
        <div class="card dark-card shadow-lg border-0 rounded-4 h-100">
            <div class="card-body p-4">

                <h4 class="fw-semibold mb-4 text-center">
                    Edit Product: {{ $edit->name }}
                </h4>

                <!-- Edit Product Form -->
                <form action="{{ route('EditProduct',$edit->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label fw-medium">Name</label>
                        <input type="text" name="name" class="form-control form-control-lg"
                               value="{{ old('name',$edit->name) }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-medium">Info</label>
                        <input type="text" name="info" class="form-control form-control-lg"
                               value="{{ old('info',$edit->info) }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-medium">Description</label>
                        <input type="text" name="description" class="form-control form-control-lg"
                               value="{{ old('description',$edit->description) }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-medium">Price</label>
                        <input type="number" name="price" class="form-control form-control-lg"
                               value="{{ old('price',$edit->price) }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-medium">Quantity</label>
                        <input type="number" name="quantity" class="form-control form-control-lg"
                               value="{{ old('quantity',$edit->quantity) }}" required>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-medium">Image</label>
                        <input type="file" name="image" class="form-control">
                        <small class="text-muted">PNG / JPG</small>
                    </div>

                    <button type="submit"
                            class="btn btn-primary btn-lg rounded-pill w-100 shadow-sm">
                        Update Product
                    </button>
                </form>

                <hr class="my-4 border-secondary">

                <!-- Add Product Tag -->
                <h5 class="fw-semibold mb-3">Add Product Tag</h5>

                <form action="{{ route('addProductTag',$edit->id) }}" method="POST" class="d-flex gap-2">
                    @csrf
                    <select name="tag_id" class="form-control" required>
                        @foreach ($tag as $t)
                            <option value="{{ $t->id }}">{{ $t->name }}</option>
                        @endforeach
                    </select>

                    <button type="submit" class="btn btn-success rounded-pill px-4">
                        Add
                    </button>
                </form>

                <!-- Existing Tags -->
                <h5 class="fw-semibold mt-4 mb-3">Existing Tags</h5>

                @foreach($edit->tags as $tag)
                    <div class="tag-item">
                        <span>{{ $tag->name }}</span>
                        <form action="{{ route('RemoveProductTags',[$edit->id,$tag->id]) }}" method="POST">
                            @csrf
                            <button class="btn btn-sm btn-outline-danger rounded-pill">
                                Remove
                            </button>
                        </form>
                    </div>
                @endforeach

                <!-- Success Message -->
                @if(session('success'))
                    <div class="alert alert-success mt-4 text-center">
                        {{ session('success') }}
                    </div>
                @endif
                @if(session('error'))
                    <div class="alert alert-danger rounded-4 shadow-sm mb-4">
                    {{ session('error') }}
                    </div>
                @endif


            </div>
        </div>
    </div>
</div>
<hr class="my-5 border-secondary">

<div class="container d-flex justify-content-center mb-5">
    <div class="col-md-6">
        <div class="card dark-card border-0 rounded-4 shadow-lg">
            <div class="card-body p-4">

                <h5 class="fw-semibold mb-3 text-center">
                    Add Product Images
                </h5>

                <form action="{{route('addImage',$edit->id)}}"
                      method="POST"
                      enctype="multipart/form-data"
                      class="d-flex flex-column gap-3">
                    @csrf

                    <div>
                        <label class="form-label fw-medium">
                            Select Image
                        </label>
                        <input
                            type="file"
                            name="image"
                            class="form-control"
                            required
                        >
                        <small class="text-muted">
                            PNG / JPG / WEBP
                        </small>
                    </div>

                    <button
                        type="submit"
                        class="btn btn-success btn-lg rounded-pill shadow-sm w-100">
                        Add Image
                    </button>
                </form>

            </div>
        </div>
    </div>
</div>


</x-layout>
