@extends("layouts.main")

@section('container')
@if(session()->has("success"))
<p>{{ session("success") }}</p>
@endif
<section class="container-mx-7-rem py-4">
    <h1 class="taartely-color-2 fw-bold">Semua Produk</h1>
    <div class="row row-cols-1 row-cols-md-3 g-4 mt-2 mb-4">
        @foreach ($products as $product)
        <a class="text-decoration-none d-flex" href="/products/{{ $product->slug }}">
            <div class="col">
                <div class="card h-100 taartely-shadow">
                    <img src="{{ asset("/storage/".$product->image) }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title mt-2">{{ $product->name }}</h5>
                        <p  class="card-text">{{ $product->excerpt }}</p>
                        <div class="text-center">
                            <button class="btn taartely-button rounded">Add to cart</button>
                        </div>
                    </div>
                </div>
            </div>
        </a>
        @endforeach
    </div>
</section>
<div class="container-mx-7-rem">
    {{ $products->links() }}
</div>
@endsection