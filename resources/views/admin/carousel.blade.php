<x-layout>
  <div class="container my-5" style="background-color: #1c1c1c; min-height: 100vh;">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card shadow-lg rounded-3 p-4 bg-dark text-white">
            @if(session('success'))
                <p class="text-success text-center">{{ session('success') }}</p>
            @endif    
          <h2 class="card-title text-center mb-4">Add New Carousel Item</h2>
          <form action="{{ route('CarouselAction') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- Carousel Name -->
            <div class="mb-3">
              <label for="carouselName" class="form-label text-white">Carousel Name</label>
              <input type="text" class="form-control bg-secondary text-white border-0" id="carouselName" name="name" placeholder="Enter name of carousel" required>
            </div>

            <!-- Carousel Description -->
            <div class="mb-3">
              <label for="carouselDescription" class="form-label text-white">Description</label>
              <input type="text" class="form-control bg-secondary text-white border-0" id="carouselDescription" name="description" placeholder="Enter description of carousel" required>
            </div>

            <!-- Carousel Image -->
            <div class="mb-4">
              <label for="carouselImage" class="form-label text-white">Upload Image</label>
              <input type="file" class="form-control bg-secondary text-white border-0" id="carouselImage" name="image" accept="image/*" required>
              <small class="text-white-50">Upload a high-quality image (JPG, PNG)</small>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary w-100 shadow-sm rounded-pill">
              Add Carousel
            </button>

          </form>
        </div>
      </div>
    </div>
  </div>
</x-layout>
