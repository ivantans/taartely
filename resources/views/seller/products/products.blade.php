@extends('layouts.main')

@section('container')
@if (session()->has("success"))
    <p>{{ session("success") }}</p>
@endif
<section class="container-mx-7-rem py-4 rounded">
<h1 class="text-center mb-3 taartely-color-2 fw-bold">Daftar Produk Taartely</h1>
<table class="table">
    <thead>
      <tr class="text-center">
        <th scope="col">name</th>
        <th scope="col">category</th>
        <th scope="col">excerpt</th>
        <th scope="col">image</th>
        <th scope="col">action</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($products as $product)
          <tr>
            <td class="taartely-paragraph">{{ $product->name }}</td>
            <td class="taartely-paragraph">{{ $product->category->name }}</td>
            <td class="taartely-paragraph">{{ $product->excerpt }}</td>
            <td class="taartely-paragraph"><img src="{{ asset("storage/".$product->image) }}" alt="" style="width: 50px; height 50px;"></td>
            <td class="text-center fs-5" style="width: 150px">
              <a href="/seller/dashboard/products/{{ $product->slug }}" class="badge bg-info"><i class="bi bi-eye"></i></a>
              <a href="/seller/dashboard/products/{{ $product->slug }}/edit" class="badge bg-warning"><i class="bi bi-pencil-square"></i></a>

              {{-- ! Delete product * Destination URL: /seller/dashboard/products/{product} * Source URL: /seller/dashboard/products --}}
              <form action="{{ route("products.destroy", ["product" => $product->slug]) }}" method="post" class="d-inline">
                @csrf
                @method("delete")
                <button class="badge bg-danger bg-info border-0" type="submit" onclick="return confirm('are you sure?')"><i class="bi bi-trash"></i></button>
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