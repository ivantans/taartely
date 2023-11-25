<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("buyer.cart.products", [
            "carts" => Cart::where("user_id", auth()->user()->id)
                            ->latest()
                            ->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            "amount" => "required|numeric|max:1000"
        ]);

        $validatedData["user_id"] = auth()->user()->id;
        $validatedData["product_id"] = $request->product_id;
        Cart::create($validatedData);
        return redirect("/products")->with("success", "Added to cart");
    }

    /**
     * Display the specified resource.
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cart $cart)
    {
        if($request->amount != $cart->amount){
            $validatedData = $request->validate([
                "amount" => "required|numeric|max:1000"
            ]);
        } 

        $validatedData["user_id"] = auth()->user()->id;

        Cart::where("id", $request->cart_id)
        ->update($validatedData);

        return redirect("/carts")->with("success", "Amount has been updated!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cart $cart)
    {
        Cart::destroy($cart->id);
        return redirect("/carts")->with("success", "Amount has been deleted!");
    }
}
