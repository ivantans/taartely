@extends("layouts.main")

@section("container")
<?php $total_price = 0; ?>

<div class="container-mx-7-rem py-4">
    <h1 class="taartely-color-2 mb-3 fw-bold pb-2">Keranjang Saya</h1>
    {{-- * Section nama penerima dan alamat user --}}
    <div class="card w-100 mb-3">
        <div class="card-body">
            <h5 class="fw-bold p-16 taartely-paragraph16 mt-2">Kirim ke alamat:</h5>
            <p class="taartely-paragraph">{{ auth()->user()->name }}</p>

            <p class="taartely-paragraph">{{ auth()->user()->address }}</p>
        </div>
    {{-- * End section nama penerima dan alamt user --}}
    </div>


    {{-- * Cart detail product --}}
    @foreach ($carts as $cart)
    <?php $total_price += $cart->amount * $cart->product->price;?>
    <div class="card mb-3" style="max-width: 100%;">
        <div class="row g-0">
            <div class="col-md-1">
                <img src="{{ asset("/storage/". $cart->image) }}" class="img-fluid rounded-start" alt="...">
            </div>
            <div class="col-md-7">
                <div class="card-body py-2">
                    <h6 class="fw-bold p-16 taartely-paragraph16 mt-2">{{ $cart->product->name }}</h6>
                    <p style="font-size:14px;" class="taartely-paragraph text mb-1">{{ $cart->product->excerpt }}</p>
                    <p style="font-size:14px;" class="taartely-paragraph text mb-1">Total: {{ $cart->amount }}</p>
                    <p style="font-size:14px;" class="taartely-paragraph text mb-1">Harga:
                        {{ $cart->product->price }}</p>

                </div>
            </div>
            <div class="col-md-4">
                <div class="card-body">
                    <form action="{{ route('carts.update', ['cart' => $cart->id]) }}" method="post" class="d-inline">
                        @csrf
                        @method("put")
                        <div class="mb-3 input-group">
                            <input type="hidden" name="cart_id" value="{{ $cart->id }}">
                            {{-- <button type="button" class="btn rounded-start btn-md taartely-border" onclick="decrementValue()"><i class="bi bi-dash"></i></button> --}}
                            <input type="number" class="form-control @error("amount") is-invalid @enderror" id="amount" name="amount" value="{{ old("amount") < 1 ? $cart->amount:old($cart->amount) }}">
                            {{-- <button type="button" class="btn btn-md taartely-border" onclick="incrementValue()"><i class="bi bi-plus"></i></button> --}}
                            @error("amount")
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary" style="font-size:14px">Edit</button>
                    </form>
                    <form action="{{ route('carts.destroy', ['cart' => $cart->id]) }}" method="post" class="d-inline">
                        @csrf
                        @method("delete")
                        <button type="submit" style="font-size:14px" onclick="return confirm('Are you sure?')"
                            class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- * End cart detail product --}}
    @endforeach


    <div class="card w-100 mb-3">
        <div class="card-body">
            <h5 class="fw-bold p-16 taartely-paragraph16 mt-2">Rincian belanja:</h5>
                <p class="taartely-paragraph">Total belanja ({{ $total_product }} Product): <b>Rp. {{ $total_price }}</b></p>
        </div>
    </div>

    {{-- * Section pembayaran --}}
    <div class="card w-100 mb-3">
        <div class="card-body">
            <h5 class="fw-bold p-16 taartely-paragraph16 mt-2">Pembayaran:</h5>
            {{-- * Menampilkan gambar QRIS --}}
            <form action="/checkout" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="total_price" value="{{ $total_price }}">
                <input type="hidden" name="total_product" value="{{ $total_product }}">
                <p class="fw-bold p-16 taartely-paragraph16 mt-2">Total belanja ({{ $total_product }} Product): <b>Rp. {{ number_format($total_price, "0", ".", ".") }}</b></p>
            
            <button class="btn taartely-button">Check Out</button>
            </form>
        </div>
    {{-- * End section pembayaran --}}
    </div>


</div>
@endsection
