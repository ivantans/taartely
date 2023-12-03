<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;

class CheckOutController extends Controller
{
    public function store(Request $request){
        $validatedData = $request->validate([
            "image" => "required|image|file|max:2048",
        ]);

        $validatedData["total_price"] = $request->input("total_price");
        $validatedData["status"] = "pending";


        $validatedData["image"] = $request->file("image")->store("payment_proofs");
        
        $order = new Order();
        $order->user_id = auth()->user()->id;
        $order->total_price = $request->input("total_price"); 
        $order->status = 'pending';
        $order->image = $validatedData["image"];
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
}
