<x-layout>

<style>
    .tag-edit {
        opacity: 0;
        transition: opacity 0.2s ease;
        font-size: 0.9rem;
    }

    .list-group-item:hover .tag-edit {
        opacity: 1;
    }
</style>

<div class="container py-5" style="background-color: #1c1c1c; min-height: 100vh;">

    <!-- Page Title -->
    <div class="text-center mb-5">
        <h1 class="fw-bold text-white">Manage Tags</h1>
        <p class="text-white-50">Create and manage tags easily</p>
    </div>

    <div class="row g-4">

        <!-- Tags List -->
        <div class="col-md-6">
            <div class="card shadow-lg border-0 rounded-4 h-100 bg-dark text-white">
                <div class="card-body p-4">
                    <h4 class="fw-semibold mb-4 text-white">Existing Tags</h4>

                    @if($tag->count())
                        <ul class="list-group list-group-flush bg-dark">
                            @foreach ($tag as $t)
                                <li class="list-group-item d-flex justify-content-between align-items-center bg-dark text-white border-0">
                                    <div class="d-flex align-items-center gap-2">
                                        <span class="fw-medium">{{ $t->name }}</span>

                                        <a href="{{ route('editTag', $t->id) }}"
                                           class="text-decoration-none text-info tag-edit"
                                           title="Edit Tag">
                                            ✏️
                                        </a>
                                    </div>

                                    <span class="badge bg-info rounded-pill">Tag</span>
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <p class="text-white-50">No tags found.</p>
                    @endif
                </div>
            </div>
        </div>

        <!-- Create Tag -->
        <div class="col-md-6">
            <div class="card shadow-lg border-0 rounded-4 h-100 bg-dark text-white">
                <div class="card-body p-4">
                    <h4 class="fw-semibold mb-4 text-white">Create New Tag</h4>

                    <form action="{{ route('tagsAction') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label fw-medium text-white">Tag Name</label>
                            <input type="text"
                                   name="name"
                                   class="form-control form-control-lg bg-secondary text-white border-0"
                                   placeholder="Enter tag name"
                                   required>
                        </div>

                        <button type="submit"
                                class="btn btn-success btn-lg rounded-pill px-4 shadow-sm">
                            + Add Tag
                        </button>
                    </form>

                </div>
            </div>
        </div>

    </div>

    <!-- Success Message -->
    @if(session('success'))
        <div class="alert alert-success mt-4 text-center rounded-3">
            {{ session('success') }}
        </div>
    @endif

</div>

</x-layout>
