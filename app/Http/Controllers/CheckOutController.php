<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CheckOutController extends Controller
{
    public function index(Order $order){
        $this->authorize("buyer");
        if(auth()->user()->id != $order->user_id){
            return redirect()->back();
        }

        return view("buyer.payments.payment", [
            "order" => $order
        ]);
    }

    public function store(Request $request){
        $this->authorize("buyer");
        $rules = [
            'total_price' => 'required|numeric|min:0',
            'total_product' => 'required|integer|min:1',
            'address' => 'required|max:255',
            'due_date' => 'required|date|after_or_equal:today|date_format:Y-m-d',
            'phone_number' => 'required|string|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect('/carts')
                ->withErrors($validator)
                ->withInput();
        }
        $user = User::findOrFail(auth()->user()->id);
        if (!$user->phone_number) {
            $user->update(['phone_number' => $request->input('phone_number')]);
        }
        $order = new Order();
        $order->user_id = auth()->user()->id;
        $order->total_price = $request->input("total_price"); 
        $order->total_product = $request->input("total_product");
        $order->address = $request->input("address");
        $order->due_date = $request->input("due_date");
        $order->phone_number = $request->input("phone_number");
        $order->note = $request->input("note");
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
        $this->authorize("buyer");
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
