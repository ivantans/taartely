@extends('layouts.main')

@section("container")
<section class="container-mx-12-rem py-5">
    <div class="row justify-content-evenly pt-10">
        <a class="text-center pt-3" href="/seller/dashboard/products"><button class="btn taartely-button taartely-shadow rounded">Kembali ke Semua Products</button></a>
    </div>
  </section>
<section class="container-mx-7-rem py-5">
    <p><b>id:</b> {{ $product->id }}</p>
    <p>nama: {{ $product->name }}</p>
    <p>category: {{ $product->category->name }}</p>
    <p>pembuat: {{ $product->user->name }}</p>
    <p>slug: {{ $product->slug }}</p>
    <p>slogan: {{ $product->excerpt }}</p>
    <p>deskripsi: {!! $product->description !!}</p>
    <img src="{{ asset("storage/".$product->image) }}" style="heigt:250px; width: 250px" alt="">
    <p>harga: {{ $product->price }}</p>
    <p>dibuat: {{ $product->created_at->diffForHumans() }}</p>
</section>
@endsection