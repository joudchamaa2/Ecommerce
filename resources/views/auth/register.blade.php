<x-layout>
  <main class="d-flex w-100 align-items-center justify-content-center" style="height: 100vh; background-color: #1c1c1c;">

    <form class="card p-4 shadow-lg bg-dark text-white rounded-4" action="{{ route('registerAction') }}" method="POST" style="width: 100%; max-width: 400px;">
      @csrf

      <h1 class="mb-4 text-center text-primary">Sign Up</h1>

      <!-- Username -->
      <div class="mb-3">
        <label for="username" class="form-label text-white">Username</label>
        <input
          type="text"
          name="name"
          class="form-control bg-secondary text-white border-0"
          id="username"
          required
        />
        @error('name')
          <p class="text-danger mt-1">{{ $message }}</p>
        @enderror
      </div>

      <!-- Email -->
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label text-white">Email address</label>
        <input
          type="email"
          name="email"
          class="form-control bg-secondary text-white border-0"
          id="exampleInputEmail1"
          required
        />
        <div id="emailHelp" class="form-text text-white-50">
          We'll never share your email with anyone else.
        </div>
        @error('email')
          <p class="text-danger mt-1">{{ $message }}</p>
        @enderror
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
        @error('password')
          <p class="text-danger mt-1">{{ $message }}</p>
        @enderror
      </div>

      <!-- Confirm Password -->
      <div class="mb-3">
        <label for="password_confirmation" class="form-label text-white">Confirm Password</label>
        <input
          type="password"
          name="password_confirmation"
          class="form-control bg-secondary text-white border-0"
          id="password_confirmation"
          required
        />
        @error('password_confirmation')
          <p class="text-danger mt-1">{{ $message }}</p>
        @enderror
      </div>

      <!-- Terms -->
      <div class="mb-3 form-check">
        <input type="checkbox" class="form-check-input" id="exampleCheck1" required />
        <label class="form-check-label text-white" for="exampleCheck1">
          I agree to <a href="#" class="text-primary">terms of policy</a>
        </label>
      </div>

      <!-- Sign in link -->
      <h6 class="text-white-50 mb-3" style="font-size: 0.85rem;">
        Have an account? <a href="{{ route('loginPage') }}" class="text-primary">Sign in</a>
      </h6>

      <!-- Submit Button -->
      <button type="submit" class="btn btn-primary w-100 rounded-pill shadow-sm">Submit</button>

    </form>

  </main>
</x-layout>

