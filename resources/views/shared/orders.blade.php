@extends("layouts.main")

@section("container")
<div class="container-mx-7-rem py-4">
    <h1 class="taartely-color-2 fw-bold">Pesanan Saya</h1>
    <div class="card">
        <div class="card-header">
            <ul class="nav nav-tabs card-header-tabs">
                <li class="nav-item">
                    <a class="taartely-paragraph nav-link {{ request()->has('status')? 'text-dark' : 'active' }}" href="{{ auth()->user()->is_seller?"/seller":"" }}/orders">All Orders</a>
                </li>
                <li class="nav-item">
                    <a class="taartely-paragraph nav-link {{ request()->has('status') && request('status') == 'pending' ? 'active' : 'text-dark' }}" href="{{ auth()->user()->is_seller?"/seller":"" }}/orders?status=pending">Pending / Menunggu ketersediaan penjual</a>
                </li>
                <li class="nav-item">
                    <a class="taartely-paragraph nav-link {{ request()->has('status') && request('status') == 'accept' ? 'active' : 'text-dark' }}" href="{{ auth()->user()->is_seller?"/seller":"" }}/orders?status=accept">Accept / Perlu dibayar</a>
                </li>
                <li class="nav-item">
                    <a class="taartely-paragraph nav-link {{ request()->has('status') && request('status') == 'done_payment' ? 'active' : 'text-dark' }}" href="{{ auth()->user()->is_seller?"/seller":"" }}/orders?status=done_payment">Done_payment / Sudah dibayar</a>
                </li>
                <li class="nav-item">
                    <a class="taartely-paragraph nav-link {{ request()->has('status') && request('status') == 'process' ? 'active' : 'text-dark' }}" href="{{ auth()->user()->is_seller?"/seller":"" }}/orders?status=process">Process / Sedang di proses</a>
                </li>
                <li class="nav-item">
                    <a class="taartely-paragraph nav-link {{ request()->has('status') && request('status') == 'completed' ? 'active' : 'text-dark' }}" href="{{ auth()->user()->is_seller?"/seller":"" }}/orders?status=completed">Completed</a>
                </li>
                <li class="nav-item">
                    <a class="taartely-paragraph nav-link {{ request()->has('status') && request('status') == 'cancelled' ? 'active' : 'text-dark' }}" href="{{ auth()->user()->is_seller?"/seller":"" }}/orders?status=cancelled">Cancelled</a>
                </li>
            </ul>
        </div>
        
        <div class="card-body">
            @foreach ($orders as $order)

            <div class="card w-100 mb-3">
                <div class="card-body">
                    <h5 class="card-title">Status: {{ $order->status }}</h5>
                    <table class="table">
                        <tbody>
                            @foreach ($order->orderDetails as $orderDetail)
                            <tr>
                                <th scope="row">
                                    <img class="img-fluid border" src="{{ asset("storage/".$orderDetail->product->image) }}"
                                    alt="" style="width: 20px;height: 20px">
                                </th>
                                <td>{{ $orderDetail->product->name }}</td>
                                <td>{{ $orderDetail->quantity }}x</td>
                                <td>Rp {{ number_format($orderDetail->product->price,0,".",".") }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <p class="card-title">Total belanja: Rp. {{ number_format($order->total_price) }}</p>
                    @can("buyer")
                        @if ($order->status=="accept")
                        <a href="/payment/{{ $order->id }}">Bayar sekarang</a>
                        @endif  
                    @endcan

                    @can("seller")
                        @if ($order->status=="pending")
                        <form action="/updateFromPending/{{ $order->id }}" method="post">
                            @csrf
                            @method("put")
                            <button type="submit">Terima pesanan</button>
                        </form>
                        @endif  
                        @if ($order->status=="done_payment")
                        <form action="/updateFromDonePayment/{{ $order->id }}" method="post">
                            @csrf
                            @method("put")
                            <button type="submit">Proses pesanan</button>
                        </form>
                        @endif  
                        @if ($order->status=="done_payment")
                        <form action="/updateFromDonePaymentButCancel/{{ $order->id }}" method="post">
                            @csrf
                            @method("put")
                            <button type="submit">Cancel pesanan</button>
                        </form>
                        @endif  
                        @if ($order->status=="process")
                        <form action="/updateFromProcess/{{ $order->id }}" method="post">
                            @csrf
                            @method("put")
                            <button type="submit">Pesanan Selesai</button>
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