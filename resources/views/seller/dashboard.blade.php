@extends('layouts.main')

@section('container')
<section class="container-mx-12-rem py-5">
    <h1 class="taartely-title text-center">Dashboard</h1>
    <div class="row justify-content-evenly pt-5">
        <div class="col-lg-3 border rounded text-center h-100 py-4 px-4">
            <p class="fw-semibold taartely-color-3 card-title">Tambah Produk</p>
            <p class="fw-lighter mb-0 pb-0">Ada Produk baru?</p>
            <p class="fw-lighter mt-0 pt-0">Ayo tambah produk anda</p>
            <a href="/seller/dashboard/products"><button class="btn mt-1 taartely-button taartely-shadow rounded">Tambah product</button></a>
        </div>
        <div class="col-lg-3 border rounded text-center h-100 py-4 px-4">
            <p class="fw-semibold taartely-color-3 card-title">Tambah Kategori</p>
            <p class="fw-lighter mb-0 pb-0">Ada kategori baru?</p>
            <p class="fw-lighter mt-0 pt-0">Ayo tambah kategori anda</p>
            <a href="/seller/dashboard/categories"><button class="btn mt-1 taartely-button taartely-shadow rounded">Tambah kategori</button></a>
        </div>
    </div>
</section>
@endsection