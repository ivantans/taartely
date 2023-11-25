@extends('seller.layouts.main')

@section("container")
    <a href="/seller/dashboard/products">Back to all products</a>
    <p>id: {{ $product->id }}</p>
    <p>nama: {{ $product->name }}</p>
    <p>category: {{ $product->category->name }}</p>
    <p>pembuat: {{ $product->user->name }}</p>
    <p>slug: {{ $product->slug }}</p>
    <p>slogan: {{ $product->excerpt }}</p>
    <p>deskripsi: {!! $product->description !!}</p>
    <img src="{{ asset("storage/".$product->image) }}" style="heigt:250px; width: 250px" alt="">
    <p>harga: {{ $product->price }}</p>
    <p>dibuat: {{ $product->created_at->diffForHumans() }}</p>

@endsection