@extends("layouts.main")

@section('container')

<div class="py-5">
<div class="row container-mx-7-rem justify-content-between p-2 border rounded">
    <div class="col-md-6">
        <img src="{{ asset("storage/".$product->image) }}" alt="" class="img-fluid">
    </div>
    <div class="col-md-6">
        <h3 class="fw-bold taartely-paragraph16 mt-5 mb-0">{{ $product->name }}</h3>
        <small class="taartely-paragraph">{{ $product->excerpt }}</small>
        <h1 class="taartely-color-1 p-40 pt-2 pb-2">Rp{{ number_format($product->price, 0, ",",".") }}</h1>
        <div class="row justify-content-start mt-4">
            <div class="col-md-2 mt-4">
                <small class="taartely-paragraph fw-light"> Pengiriman</small>
                <small class="taartely-paragraph fw-light d-block my-4"> Amount</small>
            </div>
            <div class="col-md-10 mt-4">
                <p class="text-success"><i class="bi bi-truck"></i> Gratis ongkir</p>
                
                {{-- ! Store new carts * Destination URL: /carts * Source URL: /products/{product} --}}
                <form action="{{ route("carts.store") }}" method="post">
                    @csrf
                    <div class="mb-3 input-group">
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        {{-- <button type="button" class="btn rounded-start btn-md" onclick="decrementValue()"></button> --}}
                        <input type="number" class="form-control @error("amount") is-invalid @enderror" id="amount" name="amount" value="{{ old("amount", 1) }}">
                        {{-- <button type="button" class="btn btn-md" onclick="incrementValue()"></button> --}}
                        @error("amount")
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <button type="submit" class="btn taartely-button" style="width: 100%" @can("seller") disabled @endcan>Masukkan Keranjang</button>
                </form>     
            </div>
        </div>
    </div>
</div>
</div>
@endsection