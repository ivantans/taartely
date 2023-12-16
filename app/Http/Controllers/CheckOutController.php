<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;

class CheckOutController extends Controller
{
    public function index(Order $order){
        if(auth()->user()->id != $order->user_id){
            return redirect()->back();
        }

        return view("buyer.payments.payment", [
            "order" => $order
        ]);
    }

    public function store(Request $request){
        $order = new Order();
        $order->user_id = auth()->user()->id;
        $order->total_price = $request->input("total_price"); 
        $order->total_product = $request->input("total_product");
        $order->status = 'pending';
        $order->save();

        $cartItems = Cart::where("user_id", auth()->user()->id)->get();
        foreach ($cartItems as $cartItem) {
            $orderDetail = new OrderDetail();
            $orderDetail->order_id = $order->id;
            $orderDetail->product_id = $cartItem->product_id;
            $orderDetail->quantity = $cartItem->amount;
            $orderDetail->price = $cartItem->product->price;
            $orderDetail->save();
        }
        $cartItems->each->delete();

        return redirect('/orders')->with('success', 'New orders has been added!');
    }

    public function payment(Request $request, Order $order){
        $validatedData = $request->validate([
            "image" => "required|image|file|max:2048",
        ]);

        $validatedData["image"] = $request->file("image")->store("payment_proofs");
        $validatedData["status"] = "done_payment";
        Order::where("id", $order->id)
                ->update($validatedData);
        return redirect('/orders')->with('success', 'Bukti bayar sudah diupload');
    }
}
