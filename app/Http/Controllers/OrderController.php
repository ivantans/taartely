<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $this->authorize("buyer");
        $userId = auth()->user()->id;

        $orders_query = Order::with(['orderDetails.product'])->where('user_id', $userId);

        // Memeriksa dan memperbarui status pesanan yang sudah melewati batas waktu
        foreach ($orders_query->get() as $order) {
            if ($order->isExpired()) {
                $order->status = 'cancelled';
                $order->save();
            }
        }
        $status = $request->input('status');
        if ($status) {
            $orders_query->where('status', $status);
        }

        $orders = $orders_query->latest()->get();

        return view("shared.orders", [
            "title" => "My Order",
            "orders" => $orders
        ]);
    }
    
}
