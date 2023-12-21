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
            @foreach ($orders as $order)

            <div class="card w-100 mb-3">
                <div class="card-body">
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
                        <a class="btn taartely-button p-14" href="/payment/{{ $order->id }}">Bayar sekarang</a>
                        @endif  
                    @endcan

                    @can("seller")
                        @if ($order->status=="pending")
                        <div class="row">
                            <div class="d-flex pt-2 col-lg-3" style="width: 180px">
                                <form action="/updateFromPending/{{ $order->id }}" method="post">
                                    @csrf
                                    @method("put")
                                    <button class="btn taartely-button p-14" type="submit">Terima pesanan</button>
                                </form>
                            </div>
                            <div class="d-flex pt-2 col-lg-9">
                                <form action="/updateFromDonePaymentButCancel/{{ $order->id }}" method="post">
                                    @csrf
                                    @method("put")
                                    <button class="btn taartely-button p-14" type="submit">Tolak pesanan</button>
                                </form>
                            </div>
                        </div>
                        @endif  
                        @if ($order->status=="done_payment")
                        <div class="row g-0">
                            <div class="d-flex pt-2 col-lg-3">
                                <form action="/updateFromDonePayment/{{ $order->id }}" method="post">
                                    @csrf
                                    @method("put")
                                    <button class="btn taartely-button p-14" type="submit">Proses pesanan</button>
                                </form>
                            </div>
                            <div class="d-flex pt-2 col-lg-9">
                                <form action="/updateFromDonePaymentButCancel/{{ $order->id }}" method="post">
                                    @csrf
                                    @method("put")
                                    <button class="btn taartely-button p-14" type="submit">Tolak pesanan</button>
                                </form>
                            </div>
                        </div>
                        @endif   
                        @if ($order->status=="process")
                        <form action="/updateFromProcess/{{ $order->id }}" method="post">
                            @csrf
                            @method("put")
                            <button class="btn taartely-button p-14" type="submit">Pesanan Selesai</button>
                        </form>
                        @endif  
                    @endcan
                    
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection