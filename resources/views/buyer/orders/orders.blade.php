@extends("layouts.main")

@section("container")
<h1>My Orders</h1>
<div class="card">
    <div class="card-header">
        <ul class="nav nav-tabs card-header-tabs">
            <li class="nav-item">
                <a class="nav-link {{ request()->has('status')? 'text-dark' : 'active' }}" href="/orders">All Orders</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->has('status') && request('status') == 'pending' ? 'active' : 'text-dark' }}" href="/orders?status=pending">Pending</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->has('status') && request('status') == 'accept' ? 'active' : 'text-dark' }}" href="/orders?status=accept">Accept</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->has('status') && request('status') == 'completed' ? 'active' : 'text-dark' }}" href="/orders?status=completed">Completed</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->has('status') && request('status') == 'cancelled' ? 'active' : 'text-dark' }}" href="/orders?status=cancelled">Cancelled</a>
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
                            <td>Rp. {{ number_format($orderDetail->product->price) }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                <p class="card-title">Total belanja: Rp. {{ number_format($order->total_price) }}</p>

            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection