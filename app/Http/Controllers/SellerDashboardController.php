<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class SellerDashboardController extends Controller
{

    public function index(){
        return view("seller.dashboard", [
            "title" => "Dashboard",
            "total_pending" => Order::where("status", "pending")->count(),
            "total_accept" => Order::where("status", "accept")->count(),
            "total_done_payment" => Order::where("status", "done_payment")->count(),
            "total_process" => Order::where("status", "process")->count(),
            "total_cancelled" => Order::where("status", "cancelled")->count(),
        ]);
    }
}
