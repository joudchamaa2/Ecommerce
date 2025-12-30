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

    .dark-card .form-control {
        background-color: #1c1c1c;
        color: #fff;
        border: 1px solid #444;
    }

    .dark-card .form-control::placeholder {
        color: #aaa;
    }

    .dark-card .form-control:focus {
        background-color: #1c1c1c;
        color: #fff;
        border-color: #0d6efd;
        box-shadow: none;
    }

    .text-muted {
        color: #aaa !important;
    }
</style>

<div class="container py-5">

    <!-- Page Title -->
    <div class="text-center mb-5">
        <h1 class="fw-bold text-white">Edit Tag</h1>
        <p class="text-muted">Update the tag name below</p>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-6">

            <div class="card dark-card shadow-lg border-0 rounded-4">
                <div class="card-body p-4">

                    <form action="" method="POST">
                        @csrf

                        <div class="mb-4">
                            <label for="edittag" class="form-label fw-medium">
                                Tag Name
                            </label>

                            <input
                                type="text"
                                id="edittag"
                                name="name"
                                class="form-control form-control-lg"
                                placeholder="Edit the name of tag"
                                value="{{ old('name', $tag->name) }}"
                                required
                            >
                        </div>

                        <div class="d-flex justify-content-between align-items-center">
                            <a href="{{ url()->previous() }}"
                               class="btn btn-outline-light rounded-pill px-4">
                                Cancel
                            </a>

                            <button
                                type="submit"
                                class="btn btn-primary btn-lg rounded-pill px-5 shadow-sm">
                                Update
                            </button>
                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>

</div>

</x-layout>
