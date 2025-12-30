<x-layout>
    <main class="container mt-4">
        <div class="row mb-4">
            <h3 style="color: white;">All Categories</h3>
            <div class="d-flex flex-wrap gap-2">
                @foreach($tags as $tag)
                    <a href="{{route('productsFilter' , $tag->id)}}"
                       class="tag-link px-3 py-1 rounded-pill text-white text-decoration-none">
                        {{$tag->name}}
                    </a>
                @endforeach
            </div>
        </div>
        @if(isset($selectedTag))
            <div class="row mb-4">
                <h4 style="color: white;">Filtered by Tag: {{$selectedTag}}</h4>
            </div>
        @endif
        @if(isset($keyword))
            <div class="row mb-4">
                <h4 style="color: white;">Search Results for: "{{$keyword}}"</h4>
            </div>
        @endif

        <div class="row">
            @forelse ($products as $p)
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
            @empty
                <div class="col-12">
                    <p class="text-white">No products found.</p>
                </div>
            @endforelse
        </div>
    </main>

    <style>
        .card-dark {
            background-color: #1c1c1c;
            border: none;
        }

        /* Modern tag links */
        .tag-link {
            background-color: #2c2c2c;
            transition: all 0.3s;
        }

        .tag-link:hover {
            background-color: #007bff;
            color: white;
            text-decoration: none;
            transform: translateY(-2px);
        }
    </style>
</x-layout>
