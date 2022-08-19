@extends('layouts.main')
@section('container')
<div class="row justify-content-center">
    <div class="col-md-5">

        <main class="form-registration">
            <h1 class="h3 mb-3 mt-5 fw-normal text-center">Registration Form</h1>
            <form action="/register" method="post">
                @csrf
                <div class="form-floating">
                    <input type="text" name="name" class="form-control rounded-top @error('name') is-invalid" @enderror
                        id="name" placeholder="Name" value="{{ old('name') }}">
                    <label for="floatingInput">Name</label>
                </div>

                @error('name')
                <div class="invalid-feedback d-block">
                    {{ $message }}
                </div>
                @enderror

                <div class="form-floating">
                    <input type="text" name="username" class="form-control @error('username') is-invalid" @enderror
                        id="username" placeholder="Username" value="{{ old('username') }}">
                    <label for="floatingInput">Username</label>
                </div>

                @error('username')
                <div class="invalid-feedback d-block">
                    {{ $message }}
                </div>
                @enderror


                <div class="form-floating">
                    <input type="text" name="number" class="form-control @error('number') is-invalid" @enderror
                        id="number" placeholder="Phone Number" value="{{ old('number') }}">
                    <label for="floatingInput">Phone Number</label>
                </div>

                @error('number')
                <div class="invalid-feedback d-block">
                    {{ $message }}
                </div>
                @enderror


                <div class="form-floating">
                    <input type="email" name="email" class="form-control @error('email') is-invalid" @enderror
                        id="emails" placeholder="name@example.com" value="{{ old('email') }}">
                    <label for="floatingInput">Email address</label>
                </div>


                @error('email')
                <div class="invalid-feedback d-block">
                    {{ $message }}
                </div>
                @enderror

                <div class="form-floating">
                    <input type="password" name="password" class="form-control rounded-bottom @error('name') is-invalid"
                        @enderror id="password" placeholder="Password">
                    <label for="floatingPassword">Password</label>
                </div>


                @error('password')
                <div class="invalid-feedback d-block">
                    {{ $message }}
                </div>
                @enderror


                <button class="w-100 btn btn-lg btn-warning mt-3" type="submit"> Register </button>
            </form>
            <small class="d-block text-center mt-3 ">Already registered? <a href="/login">Login</a></small>
        </main>
    </div>
</div>
@endsection