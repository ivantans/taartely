<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class SellerOrderController extends Controller
{
    public function index(Request $request){
        $orders = Order::all();

        foreach ($orders as $order) {
            if ($order->isExpired()) {
                $order->status = 'cancelled';
                $order->save();
            }
        }

        $orders_query = Order::query();
        $status = $request->input('status');
        if ($status) {
            $orders_query->where('status', $status);
        }

        $orders = $orders_query->get();

        return view("shared.orders", [
            "orders" => $orders
        ]);
    }

    public function updateFromPending(Order $order){
        $data["status"] = "accept";

        Order::where("id", $order->id)
            ->update($data);

        return redirect("/seller/orders")->with("success", "berhasil di terima");
    }

    public function updateFromDonePayment(Order $order){
        $data["status"] = "process";

        Order::where("id", $order->id)
            ->update($data);
        
        return redirect("/seller/orders")->with("success", "berhasil di process");
    }
    public function updateFromDonePaymentButCancel(Order $order){
        $data["status"] = "cancelled";

        Order::where("id", $order->id)
            ->update($data);

        return redirect("/seller/orders")->with("success", "berhasil di cancel");
    }
    public function updateFromProcess(Order $order){
        $data["status"] = "completed";

        Order::where("id", $order->id)
            ->update($data);

        return redirect("/seller/orders")->with("success", "berhasil di update");
    }
}
