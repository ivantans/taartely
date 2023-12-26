@extends("layouts.main")

@section("container")
<div class="container-mx-7-rem py-4">
    <h1 class="taartely-color-2 fw-bold pb-3">Daftar Pesanan</h1>
    <div class="card">
        <div class="card-header">
            <ul class="nav nav-tabs card-header-tabs">
                <li class="nav-item">
                    <a class="taartely-paragraph nav-link {{ request()->has('status')? 'text-dark' : 'active' }}" href="{{ auth()->user()->is_seller?"/seller":"" }}/orders">Semua Pesanan</a>
                </li>
                <li class="nav-item">
                    <a class="taartely-paragraph nav-link {{ request()->has('status') && request('status') == 'pending' ? 'active' : 'text-dark' }}" href="{{ auth()->user()->is_seller?"/seller":"" }}/orders?status=pending">Menunggu Persetujuan</a>
                </li>
                <li class="nav-item">
                    <a class="taartely-paragraph nav-link {{ request()->has('status') && request('status') == 'accept' ? 'active' : 'text-dark' }}" href="{{ auth()->user()->is_seller?"/seller":"" }}/orders?status=accept">Perlu dibayar</a>
                </li>
                <li class="nav-item">
                    <a class="taartely-paragraph nav-link {{ request()->has('status') && request('status') == 'done_payment' ? 'active' : 'text-dark' }}" href="{{ auth()->user()->is_seller?"/seller":"" }}/orders?status=done_payment">Sudah dibayar</a>
                </li>
                <li class="nav-item">
                    <a class="taartely-paragraph nav-link {{ request()->has('status') && request('status') == 'process' ? 'active' : 'text-dark' }}" href="{{ auth()->user()->is_seller?"/seller":"" }}/orders?status=process">Proses</a>
                </li>
                <li class="nav-item">
                    <a class="taartely-paragraph nav-link {{ request()->has('status') && request('status') == 'completed' ? 'active' : 'text-dark' }}" href="{{ auth()->user()->is_seller?"/seller":"" }}/orders?status=completed">Selesai</a>
                </li>
                <li class="nav-item">
                    <a class="taartely-paragraph nav-link {{ request()->has('status') && request('status') == 'cancelled' ? 'active' : 'text-dark' }}" href="{{ auth()->user()->is_seller?"/seller":"" }}/orders?status=cancelled">Dibatalkan</a>
                </li>
            </ul>
        </div>
        <div class="card-body">
            @if ($orders->count() == 0)
                <h1 class="taartely-paragraph text-center pt-2">Data tidak tersedia</h1>
            @else
            @foreach ($orders as $order)
            <div class="card w-100 mb-3">
                <div class="card-body">
                    {{-- * ALAMAT --}}
                    <table class="taartely-paragraph">
                        <tr>
                        <td class="mb-2" style="width: 200px">Pembeli</td>
                        <td class="mt-5 mb-0" style="width: 10px">:</td>
                        <td>{{ $order->user->name }}</td>
                        </tr>
                        <tr>
                        <td>Alamat</td>
                        <td>:</td>
                        <td>{{ $order->address }}</td>
                        </tr>
                        <tr>
                        <td>Dikirim pada tanggal</td>
                        <td>:</td>
                        <td>{{ $order->due_date }}</td>
                        </tr>
                        <tr>
                        <td>No telp pembeli</td>
                        <td>:</td>
                        <td>{{ $order->phone_number }}</td>
                        </tr>
                        <tr>
                        <td>Pesan untuk penjual:</td>
                        <td>:</td>
                        <td>{{ $order->note }}</td>
                        </tr>
                    </table>
                    <h5 class="fw-bold taartely-paragraph16 p-16 mt-2">Status: {{ $order->status }}</h5>
                    <table class="table">
                        <tbody>
                            @foreach ($order->orderDetails as $orderDetail)
                            <tr class="taartely-paragraph">
                                <th scope="row" style="width: 60px;">
                                    <img class="img-fluid" src="{{ asset("storage/".$orderDetail->product->image) }}"
                                    alt="" style="width: 50px;height: 50px">
                                </th>
                                <td style="width: 700px;">{{ $orderDetail->product->name }}</td>
                                <td class="text-center">{{ $orderDetail->quantity }}x</td>
                                <td>Rp {{ number_format($orderDetail->product->price,0,".",".") }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <p class="card-title"><b>Total belanja</b>: Rp. {{ number_format($order->total_price) }}</p>
                    @can("buyer")
                        @if ($order->status=="accept")
                        <a class="btn btn-success p-14" href="/payment/{{ $order->id }}">Bayar sekarang</a>
                        @endif  
                    @endcan

                    @can("seller")
                        @if ($order->status=="pending")
                        <div class="row">
                            <div class="d-flex pt-2 col-lg-3" style="width: 180px">
                                
                                {{-- ! Update status to accept * Destination URL: /updateFromPending/{order} * Source URL: /seller/orders --}}
                                <form action="{{ route("orders.updateFromPending", ["order" => $order->id]) }}" method="post">
                                    @csrf
                                    @method("put")
                                    <button class="btn btn-success p-14" type="submit">Terima pesanan</button>
                                </form>
                            </div>
                            <div class="d-flex pt-2 col-lg-9">
                                {{-- ! Update status to cancelled * Destination URL: /updateFromDonePaymentButCancel/{order} * Source URL: /seller/orders --}}
                                <form action="{{ route("orders.updateFromDonePaymentButCancel", ["order" => $order->id]) }}" method="post">
                                    @csrf
                                    @method("put")
                                    <button class="btn btn-danger p-14" type="submit">Tolak pesanan</button>
                                </form>
                            </div>
                        </div>
                        @endif  

                        @if ($order->status=="done_payment")
                        <div class="row g-0">
                            <div class="d-flex pt-2 col-lg-3" style="width: 160px">

                                {{-- ! Update status to process * Destination URL: /updateFromDonePayment/{order} * Source URL: /seller/orders --}}
                                <form action="{{ route("orders.updateFromDonePayment", ["order" => $order->id]) }}" method="post">
                                    @csrf
                                    @method("put")
                                    <button class="btn btn-success p-14" type="submit">Proses pesanan</button>
                                </form>
                            </div>
                            <div class="d-flex pt-2 col-lg-3" style="width: 150px">

                                {{-- ! Update status to cancelled * Destination URL: /updateFromDonePaymentButCancel/{order} * Source URL: /seller/orders --}}
                                <form action="{{ route("orders.updateFromDonePaymentButCancel", ["order" => $order->id]) }}" method="post">
                                    @csrf
                                    @method("put")
                                    <button class="btn btn-danger p-14" type="submit">Tolak pesanan</button>
                                </form>
                            </div>
                            <div class="d-flex pt-2 col-lg-3">
                                <a class="btn btn-info text-light p-14" href="{{ asset("/storage/".$order->image) }}" target="__blank">Lihat bukti pembayaran</a>
                            </div>
                        </div>
                        @endif   
                        @if ($order->status=="process")
                        <div class="row g-0">
                            <div class="d-flex pt-2 col-lg-3" style="width: 160px">

                                {{-- ! Update status to completed * Destination URL: /updateFromProcess/{order} * Source URL: /seller/orders --}}
                                <form action="{{ route("orders.updateFromProcess", ["order" => $order->id]) }}" method="post">
                                    @csrf
                                    @method("put")
                                    <button class="btn btn-success p-14" type="submit">Pesanan Selesai</button>
                                </form>
                            </div>
                            <div class="d-flex pt-2 col-lg-3">
                                <a class="btn btn-info text-light p-14" href="{{ asset("/storage/".$order->image) }}" target="__blank">Lihat bukti pembayaran</a>
                            </div>
                        </div>
                        @endif  

                        @if($order->status=="completed")

                        <a class="btn btn-info text-light p-14" href="{{ asset("/storage/".$order->image) }}" target="__blank">Lihat bukti pembayaran</a>

                        @endif
                    @endcan
                    

                </div>
            </div>

            @endforeach
            @endif
            
        </div>
    </div>
</div>
@endsection