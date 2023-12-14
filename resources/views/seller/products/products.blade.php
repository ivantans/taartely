@extends('layouts.main')

@section('container')
<section class="container-mx-12-rem py-5">
  <h1 class="text-center mb-3 taartely-color-2 fw-bold">Daftar Produk Taartely</h1>
  <div class="row justify-content-evenly pt-10">
      <div class="col-lg-3 border rounded text-center h-100 py-4 px-4">
          <p class="fw-bold taartely-paragraph16 mt-2 mb-0">Tambah Produk</p>
          <p class="taartely-paragraph mb-0 pb-0">Ada Produk baru?</p>
          <p class="taartely-paragraph mt-0 pt-0">Ayo tambah produk anda</p>
          <a href="/seller/dashboard/products/create"><button class="btn taartely-button taartely-shadow rounded">Tambah product baru</button></a>
      </div>
      <a class="text-center pt-3" href="/seller/dashboard"><button class="btn taartely-button taartely-shadow rounded">Kembali ke Dashboard</button></a>
  </div>
</section>

@if (session()->has("success"))
    <p>{{ session("success") }}</p>
@endif
<section class="container-mx-7-rem py-5">
<table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">id</th>
        <th scope="col">name</th>
        <th scope="col">category name</th>
        <th scope="col">pembuat</th>
        <th scope="col">excerpt</th>
        <th scope="col">description</th>
        <th scope="col">image</th>
        <th scope="col">created_at</th>
        <th scope="col">Action</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($products as $product)
          <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <td class="taartely-paragraph">{{ $product->id }}</td>
            <td class="taartely-paragraph">{{ $product->name }}</td>
            <td class="taartely-paragraph">{{ $product->category->name }}</td>
            <td class="taartely-paragraph">{{ $product->user->name }}</td>
            <td class="taartely-paragraph">{{ $product->excerpt }}</td>
            <td class="taartely-paragraph">{!! Str::limit($product->description) !!}</td>
            <td class="taartely-paragraph"><img src="{{ asset("storage/".$product->image) }}" alt="" style="width: 50px; height 50px;"></td>
            <td class="taartely-paragraph">{{ $product->created_at->diffForHumans() }}</td>  
            <td class="taartely-paragraph">
              <a href="/seller/dashboard/products/{{ $product->slug }}">Show</a>|
              <a href="/seller/dashboard/products/{{ $product->slug }}/edit">Edit</a>|
              <form action="/seller/dashboard/products/{{ $product->slug }}" method="post" class="d-inline">
                @csrf
                @method("delete")
                <button type="submit" class="btn-link btn p-0 m-0" onclick="return confirm('are you sure?')">Delete</button>
              </form>  
            </td>  
          </tr>
    @endforeach
        </tbody>
    </table>
</section>
    <div class="container-mx-7-rem d-flex justify-content-center pb-3">
      {{ $products->links() }}
    </div>
@endsection