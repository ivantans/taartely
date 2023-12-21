@extends('layouts.main')
@foreach ($order->orderDetails as $orderDetail)
<div class="border">
    <h1>{{ $orderDetail->product->name }}</h1>
    <h1>{{ $orderDetail->product->price }}</h1>
    <h1>{{ $orderDetail->quantity }}</h1>
</div>
@endforeach

<h1>{{ number_format($order->total_price, "0", ",", ",") }}</h1>

<div class="card w-100 mb-3">
    <div class="card-body">
        <h5 class="fw-bold p-16 taartely-paragraph16 mt-2">Pembayaran:</h5>
        {{-- * Menampilkan gambar QRIS --}}
        <img class="img-fluid my-4 border" src="{{ asset("storage\qris-images\qris.jpg") }}" alt="" style="width: 400px;height: 500px">

        {{-- ! Update Bukti Payment * Destination URL: /payment/{order} * Source URL: /payment{order} --}}
        <form action="{{ route("payment.payment", ["order" => $order->id]) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method("put")
            <div class="mb-3">
                <label for="image" class="form-label">Upload Bukti Pembayaran:</label>
                <img class="img-preview img-fluid mb-3 col-sm-5">
                <input type="file" class="form-control @error("image") is-invalid @enderror" id="image" name="image" onchange="previewImage()">
                @error("image")
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <p class="fw-bold p-16 taartely-paragraph16 mt-2">Total belanja ({{ $order->total_product }} Product): <b>Rp. {{ number_format($order->total_price, "0", ".", ".") }}</b></p>
            <button class="btn taartely-button">Check Out</button>
        </form>

    </div>
{{-- * End section pembayaran --}}
</div>