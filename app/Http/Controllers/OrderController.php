<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $userId = auth()->user()->id;

        // Menggunakan eloquent query builder untuk mengambil data pesanan
        $orders = Order::where('user_id', $userId)->get();

        // Memeriksa dan memperbarui status pesanan yang sudah melewati batas waktu
        foreach ($orders as $order) {
            if ($order->isExpired()) {
                $order->status = 'cancelled';
                $order->save();
            }
        }

        // Menggunakan eloquent query builder untuk mengambil data pesanan
        $orderQuery = Order::where('user_id', $userId);

        // Menambahkan kondisi status jika disediakan
        $status = $request->input('status');
        if ($status) {
            $orderQuery->where('status', $status);
        }

        // Mengambil data pesanan setelah memperbarui status
        $orders = $orderQuery->get();

        return view("shared.orders", [
            "title" => "My Order",
            "orders" => $orders
        ]);
    }
    
}
