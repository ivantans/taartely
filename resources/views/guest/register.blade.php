@extends('layouts.main')

@section('container')
<div class="d-flex justify-content-center align-items-center vh-100">
    <div class="col-md-5 border rounded-3 border-1 bg-body">
        <h1 class="p-55 text-center mb-3 taartely-color-2 pt-5 pb-4 fw-bold">Register</h1>
        <div class="row justify-content-center pt-3">
            <div class="col-md-10">
                <form action="/register" method="post">
                    @csrf
                    <div class="form-floating mb-2">
                        <input type="name" name="name" id="name" class="form-control @error("name") is-invalid @enderror" value="{{ old("name") }}" placeholder="Name">
                        <label for="name">Name</label>
                        @error("name")
                        <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                        @enderror
                    </div>
                    <div class="form-floating mb-2">
                        <input type="username" name="username" id="username" class="form-control @error("username") is-invalid @enderror" value="{{ old("username") }}" placeholder="Username">
                        <label for="username">Username</label>
                        @error("username")
                        <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                        @enderror
                    </div>
                    <div class="form-floating mb-2">
                        <input type="email" name="email" id="email" class="form-control @error("email") is-invalid @enderror" value="{{ old("email") }}" placeholder="Email">
                        <label for="email">Email</label>
                        @error("email")
                        <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                        @enderror
                    </div>
                    <div class="form-floating mb-2">
                        <input type="password" name="password" id="password" class="form-control @error("password") is-invalid @enderror" value="{{ old("password") }}" placeholder="Password">
                        <label for="password">Password</label>
                        @error("password")
                        <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <button class="w-100 mt-3 btn-lg btn taartely-button" name="submit" type="submit">Submit</button>
                    </div>
                </form>
                <p class="text-center pb-2">Already have an account? <a href="/login" class="text-decoration-none">Login</a></p>
            </div>
        </div>
    </div>
</div>

{{-- 
    <form action="/register" method="post">
    @csrf
    <input type="text" name="name">
    @error('name')
        {{ $message }}
    @enderror
    <input type="text" name="username">
    <input type="email" name="email">
    <input type="password" name="password">
    <button type="submit">register</button>
    </form> --}}
@endsection