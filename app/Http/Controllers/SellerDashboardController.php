<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class SellerDashboardController extends Controller
{

    public function index(){
    $this->authorize("seller");

    $orderStatusCounts = Order::selectRaw('status, count(*) as count')
        ->groupBy('status')
        ->pluck('count', 'status');

    return view("seller.dashboard", [
        "title"              => "Dashboard",
        "total_pending"      => $orderStatusCounts['pending'] ?? 0,
        "total_accept"       => $orderStatusCounts['accept'] ?? 0,
        "total_done_payment" => $orderStatusCounts['done_payment'] ?? 0,
        "total_process"      => $orderStatusCounts['process'] ?? 0,
        "total_cancelled"    => $orderStatusCounts['cancelled'] ?? 0,
        "total_completed"    => $orderStatusCounts['completed'] ?? 0,
    ]);
}

}
