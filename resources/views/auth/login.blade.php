<x-layout>
  <main class="d-flex w-100 align-items-center justify-content-center" style="height: 100vh; background-color: #1c1c1c;">

    <form class="card p-4 shadow-lg bg-dark text-white rounded-4" action="{{ route('loginAction') }}" method="POST" style="width: 100%; max-width: 400px;">
      @csrf

      <h1 class="mb-4 text-center text-primary">Sign In</h1>

      <!-- Email -->
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label text-white">Email address</label>
        <input
          type="email"
          name="email"
          class="form-control bg-secondary text-white border-0"
          id="exampleInputEmail1"
          aria-describedby="emailHelp"
          required
        />
        <div id="emailHelp" class="form-text text-white-50">
          We'll never share your email with anyone else.
        </div>
      </div>

      <!-- Password -->
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label text-white">Password</label>
        <input
          type="password"
          name="password"
          class="form-control bg-secondary text-white border-0"
          id="exampleInputPassword1"
          required
        />
      </div>

      <!-- Remember Me -->
      <div class="mb-3 form-check">
        <input type="checkbox" class="form-check-input" id="exampleCheck1" />
        <label class="form-check-label text-white" for="exampleCheck1">Remember me</label>
      </div>

      <h6 class="text-white-50 mb-3" style="font-size: 0.85rem;">
        Don't have an account? <a href="{{ route('registerPage') }}" class="text-primary">Sign up</a>
      </h6>

      <!-- Submit Button -->
      <button type="submit" class="btn btn-primary w-100 rounded-pill shadow-sm">Submit</button>

      <!-- Error Message -->
      @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
          {{ session('error') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      @endif

    </form>

  </main>
</x-layout>
