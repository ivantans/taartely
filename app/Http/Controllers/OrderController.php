<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(Request $request){
        $status = $request->input('status');
        $ordersQuery = Order::query();
    
        // Menambahkan kondisi status jika disediakan
        if ($status) {
            $ordersQuery->where('status', $status);
        }
    
        // Menambahkan kondisi user_id
        $ordersQuery->where('user_id', auth()->user()->id);
    
        // Mengambil data pesanan
        $orders = $ordersQuery->get();
    
        return view("buyer.orders.orders", [
            "orders" => $orders
        ]);
    }
    
}
