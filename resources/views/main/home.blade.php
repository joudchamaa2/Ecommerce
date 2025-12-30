<x-layout>
   <div id="preloader" style="position: fixed; top:0; left:0; width:100%; height:100%; background:#1c1c1c; display:flex; justify-content:center; align-items:center; z-index:9999; flex-direction: column;">
    <div class="spinner mb-3"></div>
    
  </div>

  <!-- Main content -->
  <div id="main-content" style="display:none;">
    <!-- Your homepage content goes here -->
    <nav> ... </nav>
    <main> ... </main>
    <footer> ... </footer>
  </div>

  <!-- CSS -->
  <style>
    .spinner {
      width: 60px;
      height: 60px;
      border: 6px solid #f3f3f3;
      border-top: 6px solid #db7f0f;
      border-radius: 50%;
      animation: spin 1s linear infinite;
    }

    @keyframes spin {
      0% { transform: rotate(0deg); }
      100% { transform: rotate(360deg); }
    }
  </style>

  <!-- JS: 5-second preloader -->
  <script>
    // Wait 5 seconds
    setTimeout(function() {
      document.getElementById('preloader').style.display = 'none';
      document.getElementById('main-content').style.display = 'block';
    }, 700);
  </script>
    <!-- Carousel Section -->
    <div id="carouselExampleCaptions" class="carousel slide carousel-height" data-bs-ride="carousel">
        <!-- Indicators -->
        <div class="carousel-indicators">
            @for($i = 0; $i < count($carousel); $i++)
                <button
                    type="button"
                    data-bs-target="#carouselExampleCaptions"
                    data-bs-slide-to="{{$i}}"
                    @if($i == 0) class="active" aria-current="true" @endif
                    aria-label="Slide {{$i + 1}}"
                ></button>
            @endfor
        </div>

        <!-- Carousel Items -->
        <div class="carousel-inner">
            @foreach($carousel as $c)
                <div class="carousel-item {{$loop->first ? 'active' : ''}}">
                    <img src="/assets/images/{{$c->image}}" class="d-block w-100" alt="{{$c->name}}">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>{{$c->name}}</h5>
                        <p>{{$c->description}}</p>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Controls -->
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <!-- Products Grid Section -->
    <main class="container mt-4">
        <div class="row">
            @foreach ($product as $p)
                <div class="col-md-4 mb-4">
                    <div class="card h-100 card-dark">
                        <img src="/assets/images/{{$p->image}}" class="card-img-top img-fluid" alt="{{$p->name}}">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title text-white">{{$p->name}}</h5>
                            <p class="card-text text-white-50">{{$p->info}}</p>
                            <h4 class="card-text fw-bold mt-auto text-white">{{$p->price}}$</h4>
                            <div class="d-flex justify-content-between mt-2">
                                <a href="{{route('viewProduct',$p->id)}}" class="btn btn-primary">View</a>
                                <button onclick="addToCart('{{$p->name}}', {{$p->price}})" class="btn btn-primary">Add to Cart</button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            
        </div>
        {{$product->links('pagination::bootstrap-5')}}
    </main>

    <!-- Custom Styles -->
    <style>
        body {
            background-color: #1c1c1c;
        }

        /* Make cards dark to match the page */
        .card-dark {
            background-color: #1c1c1c;
            border: 1px solid #333; /* subtle border */
        }

        .card-dark .btn-primary {
            background-color: #0d6efd;
            border-color: #0d6efd;
        }

        .card-dark .btn-primary:hover {
            background-color: #0b5ed7;
            border-color: #0a58ca;
        }
    </style>
</x-layout>
