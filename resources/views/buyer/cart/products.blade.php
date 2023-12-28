@extends("layouts.main")

@section("container")
<?php $total_price = 0; ?>

<div class="container-mx-7-rem py-4">
    <h1 class="taartely-color-2 mb-3 fw-bold pb-2">Keranjang Saya</h1>
    {{-- * Section nama penerima dan alamat user --}}
    <div class="card w-100 mb-3">
        <div class="card-body">
            <h5 class="fw-bold p-16 taartely-paragraph16 mt-2">Daftar Pesanan:</h5>
        </div>
    {{-- * End section nama penerima dan alamt user --}}
    </div>


    {{-- * Cart detail product --}}
    @foreach ($carts as $cart)
    <?php $total_price += $cart->amount * $cart->product->price;?>
    <div class="card mb-3" style="max-width: 100%;">
        <div class="row g-0">
            <div class="col-md-2">
                <img src="{{ asset("/storage/". $cart->product->image) }}" class="img-fluid rounded-start" style="width: 150px" alt="...">
            </div>
            <div class="col-md-6">
                <div class="card-body py-2">
                    <h6 class="fw-bold p-16 taartely-paragraph16 mt-2">{{ $cart->product->name }}</h6>
                    <p style="font-size:14px;" class="taartely-paragraph text mb-1">{{ $cart->product->excerpt }}</p>
                    <p style="font-size:14px;" class="taartely-paragraph text mb-1">Total: {{ $cart->amount }}</p>
                    <p style="font-size:14px;" class="taartely-paragraph text mb-1">Harga:
                        {{ $cart->product->price }}</p>

                </div>
            </div>
            <div class="col-md-4 pt-3">
                <div class="card-body">

                    {{-- ! Update Keranjang * Destination URL: /carts * Source URL: /carts --}}
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
                        <button type="submit" class="btn btn-primary p-14">Simpan</button>
                    </form>

                    {{-- ! Hapus Keranjang * Destination URL: /carts * Source URL: /carts --}}
                    <form action="{{ route('carts.destroy', ['cart' => $cart->id]) }}" method="post" class="d-inline">
                        @csrf
                        @method("delete")
                        <button type="submit" onclick="return confirm('Are you sure?')"
                            class="btn btn-danger p-14">Hapus</button>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
    {{-- * End cart detail product --}}
    @endforeach

    {{-- * Section pembayaran --}}
    <div class="card w-100 mb-3">
        <div class="card-body">
            <h5 class="fw-bold p-16 taartely-paragraph16 mt-2">Lengkapi data berikut:</h5>
            {{-- ! Checkout Keranjang * Destination URL: /checkout * Source URL: /carts --}}
            <form action="{{ route('checkout.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" class="form-control" name="total_price" value="{{ $total_price }}">
                <input type="hidden" name="total_product" value="{{ $total_product }}">

                <label for="address" class="form-label taartely-paragraph">Alamat Pengiriman:</label>
                <input type="text" class="form-control taartely-paragraph" name="address" value="{{ old("address", auth()->user()->address)}}">

                <label for="phone_number" class="form-label taartely-paragraph">Nomor Telepon:</label>
                <input type="text" class="form-control taartely-paragraph" name="phone_number" value="{{ old("phone_number", auth()->user()->phone_number)}}" placeholder="notelp">

                <label for="note" class="form-label taartely-paragraph">Catatan:</label>
                <input type="text" class="form-control taartely-paragraph" name="note" value="{{ old("note")}}" placeholder="catatan untuk penjual">

                <label for="due_date" class="form-label taartely-paragraph">Tanggal Pengiriman:</label>
                <input type="date" class="form-control taartely-paragraph" name="due_date" value="{{ old("due_date") }}">

                @error("due_date")
                <p>{{ $message }}</p>
                @enderror
                <p class="fw-bold p-16 taartely-paragraph16 mt-2">Total belanja ({{ $total_product }} Product): <b>Rp. {{ number_format($total_price, "0", ".", ".") }}</b></p>
                <button class="btn btn-success p-14">Buat Pesanan</button>
            </form>

        </div>
    {{-- * End section pembayaran --}}
    </div>


</div>
@endsection
