<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class SellerOrderController extends Controller
{
    // SellerOrderController.php
    public function index(Request $request){
        $this->authorize("seller");

        $orders_query = Order::with(['orderDetails.product']);

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
            "orders" => $orders
        ]);
    }

    public function updateFromPending(Order $order){
        $this->authorize("seller");
        $data["status"] = "accept";

        Order::where("id", $order->id)
            ->update($data);

        return redirect("/seller/orders")->with("success", "berhasil di terima");
    }

    public function updateFromDonePayment(Order $order){
        $this->authorize("seller");
        $data["status"] = "process";

        Order::where("id", $order->id)
            ->update($data);
        
        return redirect("/seller/orders")->with("success", "berhasil di process");
    }
    public function updateFromDonePaymentButCancel(Order $order){
        $this->authorize("seller");
        $data["status"] = "cancelled";

        Order::where("id", $order->id)
            ->update($data);

        return redirect("/seller/orders")->with("success", "berhasil di cancel");
    }
    public function updateFromProcess(Order $order){
        $this->authorize("seller");
        $data["status"] = "completed";

        Order::where("id", $order->id)
            ->update($data);

        return redirect("/seller/orders")->with("success", "berhasil di update");
    }
}
