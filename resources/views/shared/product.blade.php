@extends("layouts.main")

@section('container')

<div class="py-5">
<div class="row container-mx-7-rem justify-content-between p-2 border rounded taartely-shadow">
    <div class="col-md-6">
        <img src="{{ asset("storage/".$product->image) }}" alt="" class="img-fluid">
    </div>
    <div class="col-md-6">
        <h3 class="mb-0">{{ $product->name }}</h3>
        <small>{{ $product->excerpt }}</small>
        <h1 class="taartely-color-1">Rp{{ number_format($product->price, 0, ",",".") }}</h1>
        <div class="row justify-content-start">
            <div class="col-md-2">
                <small class="text-secondary fw-light"> Pengiriman</small>
                <small class="text-secondary fw-light d-block my-5"> Amount</small>
            </div>
            <div class="col-md-10">
                <p class="text-success"><i class="bi bi-truck"></i> Gratis ongkir</p>
                <form action="/carts" method="post">
                    @csrf
                    <div class="mb-3 input-group">
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <button type="button" class="btn rounded-start btn-md taartely-border" onclick="decrementValue()"><i class="bi bi-dash"></i></button>
                        <input type="number" class="form-control @error("amount") is-invalid @enderror" id="amount" name="amount" value="{{ old("amount", 1) }}">
                        <button type="button" class="btn btn-md taartely-border" onclick="incrementValue()"><i class="bi bi-plus"></i></button>
                        @error("amount")
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <button type="submit" class="btn taartely-button taartely-shadow" style="width: 100%">Add to Cart</button>
                </form>     
            </div>
        </div>
    </div>
</div>
</div>
<div class="row container-mx-7-rem justify-content-between pt-2 pb-5">
    <div class="col-md-8 border rounded taartely-shadow p-3">
        <h1>Deskripsi Produk</h1>
        {!! $product->description !!}
    </div> 

    {{-- TODO: AMBIL DATA DARI CONTROLLER --}}

    <div class="col-md-3 border rounded p-3 taartely-shadow">
        <h1>Lainnya </h1>
        <a class="text-decoration-none d-flex pb-5" href="">
            <div class="col">
                <div class="card h-100">
                    <img src="{{ asset("/storage/taartely-assets/kue3.png") }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title mt-2">Product 3</h5>
                        <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloremque, obcaecati!</p>
                    </div>
                    <button class="taartely-button rounded-bottom-1">Shop Now!</button>
                </div>
            </div>
        </a>
        <a class="text-decoration-none d-flex pb-5" href="">
            <div class="col">
                <div class="card h-100">
                    <img src="{{ asset("/storage/taartely-assets/kue3.png") }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title mt-2">Product 3</h5>
                        <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloremque, obcaecati!</p>
                    </div>
                    <button class="taartely-button rounded-bottom-1">Shop Now!</button>
                </div>
            </div>
        </a>
        <a class="text-decoration-none d-flex pb-5" href="">
            <div class="col">
                <div class="card h-100">
                    <img src="{{ asset("/storage/taartely-assets/kue3.png") }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title mt-2">Product 3</h5>
                        <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloremque, obcaecati!</p>
                    </div>
                    <button class="taartely-button rounded-bottom-1">Shop Now!</button>
                </div>
            </div>
        </a>
        <a class="text-decoration-none d-flex pb-5" href="">
            <div class="col">
                <div class="card h-100">
                    <img src="{{ asset("/storage/taartely-assets/kue3.png") }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title mt-2">Product 3</h5>
                        <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloremque, obcaecati!</p>
                    </div>
                    <button class="taartely-button rounded-bottom-1">Shop Now!</button>
                </div>
            </div>
        </a>
    </div>
</div>

@endsection