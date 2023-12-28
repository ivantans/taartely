@extends("layouts.main")

@section('container')
@if (session()->has("success"))
<div class="alert alert-success alert-dismissible fade show bottom-0 end-0 position-fixed" style="z-index:999" role="alert">
    <strong>{{ session("success") }}</strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<section class="container-mx-7-rem py-4">
    <h1 class="text-center taartely-color-2 pb-4 fw-bold">Produk Taartely</h1>
    <div class="row row-cols-1 row-cols-md-3 g-5 pb-4 text-center">
        @foreach ($products as $product)
        <a class="text-decoration-none d-flex" href="{{ auth()->user() ? "/products/".$product->slug : "/login" }}">
            <div class="col">
                <div class="card h-100">
                    <img src="{{ asset("/storage/".$product->image) }}" class="card-img-top zoom" alt="...">
                    <div class="card-body">
                        <h5 class="fw-bold taartely-paragraph16 p-16 mt-2">{{ $product->name }}</h5>
                        <p  class="taartely-paragraph">{{ Str::limit($product->excerpt, 50, '...') }}</p>
                    </div>
                    <div class="text-center pb-4">
                        <button class="btn taartely-button p-14 rounded">Masukkan Keranjang</button>
                    </div>    
                </div>
            </div>
        </a>
        @endforeach
    </div>
    <div class="container-mx-7-rem d-flex justify-content-center pt-2">
        {{ $products->links() }}
    </div>
</section>

@endsection