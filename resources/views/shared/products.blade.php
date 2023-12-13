@extends("layouts.main")

@section('container')
@if(session()->has("success"))
<p>{{ session("success") }}</p>
@endif

<section class="bg-jumbotron">
    <div class="row justify-content-between container-mx-7-rem py-5">
        <div class="d-flex align-items-center col-lg-6">
            <div>
                <h1 class="taartely-title">Yuk Lihat-lihat Produknya Taartely!!</h1>
            </div>
        </div>
        <div class="col-lg-4">
            <img src="{{ asset("/storage/taartely-assets/kuee.png") }}" alt="" class="img-fluid" style="width:400px;">
        </div>
    </div>
</section>

<section class="container-mx-7-rem py-4">
    <h1 class="text-center taartely-color-2 fw-bold">Semua Produk</h1>
    <div class="row row-cols-1 row-cols-md-3 g-4 mt-2 mb-4">
        @foreach ($products as $product)
        <a class="text-decoration-none d-flex" href="/products/{{ $product->slug }}">
            <div class="col">
                <div class="card h-100 taartely-shadow">
                    <img src="{{ asset("/storage/".$product->image) }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="fw-bold taartely-paragraph16 p-18 mt-2">{{ $product->name }}</h5>
                        <p  class="taartely-paragraph align">{{ $product->excerpt }}</p>
                    </div>
                    <div class="text-center pb-3">
                        <button class="btn taartely-button p-16 rounded">Add to cart</button>
                    </div>
                </div>
            </div>
        </a>
        @endforeach
    </div>
</section>
<div class="container-mx-7-rem d-flex justify-content-center pb-3">
    {{ $products->links() }}
</div>
@endsection