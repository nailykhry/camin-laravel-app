@extends('layouts.main')
@section('container')
<div class="row justify-content-center">
  <div class="col-md-5">

    @if(session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      {{ session('success') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    @if(session()->has('loginError'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      {{ session('loginError') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <main class="form-signin">
      <h1 class="h3 mb-3 mt-5 fw-normal text-center">Please Login</h1>
      <form action="/login" method="post">
        @csrf
        <div class="form-floating">
          <input type="email" name="email" class="form-control" @error('email') is-invalid @enderror id="email"
            placeholder="name@example.com" autofoucus required>
          <label for="email">Email address</label>
        </div>

        @error('email')
        <div class="invalid-feedback d-block">
          {{ $message }}
        </div>
        @enderror

        <div class="form-floating">
          <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
          <label for="floatingPassword">Password</label>
        </div>

        <button class="w-100 btn btn-lg btn-warning" type="submit">Log in</button>
      </form>
      <small class="d-block text-center mt-3 ">Not registered? <a href="/register">Register Now!</a></small>
    </main>
  </div>
</div>
@endsection