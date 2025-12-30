<x-layout>
  <!-- Page Wrapper -->
  <div class="bg-dark text-light min-vh-100 py-5">

    <!-- Product Section -->
    <main class="container">
      <div class="row bg-black p-4 rounded-4 shadow-sm g-4">
        
        <!-- Images -->
        <div class="col-md-6">
          <img
            src="/assets/images/{{$product->image}}"
            class="img-fluid rounded-4 mb-3 w-100"
            alt="Product Image"
          />
          <div class="d-flex gap-2">
            @foreach($product->images as $s)
              <img src="/assets/images/{{$s->image}}"
                class="img-thumbnail bg-dark border-0 rounded-3"
                style="width: 90px" />
            @endforeach
          </div>
        </div>

        <!-- Product Info -->
        
        <div class="col-md-6">
          <h2 class="fw-bold mb-2">{{$product->name}}</h2>

          <p class="text-secondary small">{{$product->description}}</p>

          <h3 class="text-success fw-bold mb-3">{{$product->price}}$</h3>

          <form class="mb-4">
            <label class="form-label small">Quantity</label>
            <input
              type="number"
              class="form-control bg-dark text-light border-secondary w-50"
              value="1"
              min="1"
            />

            <button class="btn btn-success btn-sm mt-3">
              Add to Cart
            </button>
          </form>

          <ul class="list-group list-group-flush small">
            <li class="list-group-item bg-dark text-light border-secondary">
              {{$product->info}}
            </li>
          </ul>
        </div>

      </div>
    </main>

    <!-- Similar Products -->
    <!-- Similar Products -->
<section class="container mt-5">
  <h4 class="fw-bold mb-4">Similar Products</h4>

  <div class="row g-4">
    @foreach($similarProduct as $similar)
      <div class="col-6 col-md-4 col-lg-3">
        <div
          class="card bg-dark text-light border-0 rounded-4 h-100 shadow-sm similar-card"
        >
          <!-- Image -->
          <div class="position-relative">
            <img
              src="/assets/images/{{$similar->image}}"
              class="card-img-top rounded-top-4"
              style="height: 180px; object-fit: cover"
              alt="{{$similar->name}}"
            />
          </div>

          <!-- Body -->
          <div class="card-body d-flex flex-column p-3">
            <h6 class="fw-semibold mb-1">{{$similar->name}}</h6>

            <p class="text-secondary small mb-3 grow">
              {{$similar->info}}
            </p>

            <div class="d-flex justify-content-between align-items-center">
              <span class="fw-bold text-success fs-6">
                {{$similar->price}}$
              </span>

              <a
                href="{{ route('viewProduct', $similar->id) }}"
                class="btn btn-outline-success btn-sm rounded-pill px-3"
              >
                View
              </a>
            </div>
          </div>
        </div>
      </div>
    @endforeach
  </div>
</section>


  </div>
  

</x-layout>