@extends("layouts.main")

@section("container")

<div class="container-mx-7-rem py-4">
    <h1 class="taartely-color-2 fw-bold pb-3">Pembayaran</h1>
    <div class="card w-100 mb-3">
        <div class="card-body">
            @foreach ($order->orderDetails as $orderDetail)
            <div class="card card-body">
            <table class="table">
                <td>
                <table class="taartely-paragraph">
                    <tr>
                    <td class="mb-2" style="width: 100px">Nama</td>
                    <td class="mt-5 mb-0" style="width: 10px">:</td>
                    <td>{{ $orderDetail->product->name }}</td>
                    </tr>
                    <tr>
                    <td class="mb-2" style="width: 200px">Harga</td>
                    <td class="mt-5 mb-0" style="width: 10px">:</td>
                    <td>{{ $orderDetail->product->price }}</td>
                    </tr>
                    <tr>
                    <td class="mb-2" style="width: 200px">Jumlah</td>
                    <td class="mt-5 mb-0" style="width: 10px">:</td>
                    <td>{{ $orderDetail->quantity }}</td>
                    </tr>
                </table>
                </td>
            </table>
            <table class="taartely-paragraph">
                <tr>
                <td class="fw-bold p-16 taartely-paragraph16" style="width: 150px">Total belanja</td>
                <td class="fw-bold p-16 taartely-paragraph16 mt-5 mb-0" style="width: 10px">:</td>
                <td>Rp. {{ number_format($order->total_price, "0", ",", ",") }}</td>
                </tr>
            </table>
            </div>
            @endforeach
            
            <div class="card-body">
                <h5 class="fw-bold p-16 taartely-paragraph16 mt-2">Pembayaran:</h5>
                {{-- * Menampilkan gambar QRIS --}}
                <img class="img-fluid my-4 border" src="{{ asset("storage\qris-images\qris.png") }}" alt="" style="width: 400px;height: 500px">

                {{-- ! Update Bukti Payment * Destination URL: /payment/{order} * Source URL: /payment{order} --}}
                <form action="{{ route("payment.payment", ["order" => $order->id]) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method("put")
                    <div class="mb-3">
                        <label for="image" class="form-label">Upload Bukti Pembayaran:</label>
                        <img class="img-preview img-fluid mb-3 col-sm-5" style="width: 200px">
                        <input type="file" class="form-control @error("image") is-invalid @enderror" id="image" name="image" onchange="previewImage()">
                        @error("image")
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <button class="btn btn-success p-14">Bayar Sekarang</button>
                </form>
            </div>
        </div>
    {{-- * End section pembayaran --}}
    </div>
</div>

<script src="/js/imagePreview.js"></script>
@endsection