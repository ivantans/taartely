@extends('layouts.main')

@section('container')
    @if (session()->has("success"))
    <div class="alert alert-success alert-dismissible fade show bottom-0 end-0 position-fixed" style="z-index:999" role="alert">
        <strong>{{ session("success") }}</strong> Data berhasil ditambahkan, silahkan login
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    @if (session()->has("loginError"))
    <div class="alert alert-danger alert-dismissible fade show bottom-0 end-0 position-fixed" style="z-index:999" role="alert">
        <strong>{{ session("loginError") }}</strong> password atau email salah, silahkan coba lagi
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

<div class="d-flex justify-content-center align-items-center vh-100">
    <div class="col-md-5 border rounded-3 border-1 bg-body">
        <h1 class="p-55 text-center mb-3 taartely-color-2 pt-5 pb-4 fw-bold">Login</h1>
        <div class="row justify-content-center pt-3">
            <div class="col-md-10">

                {{-- ! Login Attempt * Destination URL: /login * Source URL: /login --}}
                <form action="{{ route("login.login") }}" method="post">
                    @csrf
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
                        <input type="password" name="password" id="password" class="form-control @error("password") is-invalid @enderror" placeholder="Password">
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
                
                <p class="text-center pb-2">Don't have an account? <a href="/register" class="text-decoration-none">Register</a></p>
            </div>
        </div>
    </div>
</div>
@endsection