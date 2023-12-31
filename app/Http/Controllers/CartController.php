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
        $this->authorize("buyer");
        return view("buyer.cart.products", [
            "title" => "My Cart",
            "carts" => Cart::with(['user', 'product'])->where("user_id", auth()->user()->id)
                            ->latest()
                            ->get(),
            "total_product" => Cart::where("user_id", auth()->user()->id)->count(),       
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
        $this->authorize("buyer");
        $validatedData = $request->validate([
            "amount" => "required|numeric|min:1|max:1000"
        ]);

        $validatedData["user_id"] = auth()->user()->id;
        $validatedData["product_id"] = $request->product_id;
        Cart::create($validatedData);
        return redirect("/products")->with("success", "Berhasil menambahkan produk ke Keranjang");
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
        $this->authorize("buyer");

        if($request->amount != $cart->amount){
            $validatedData = $request->validate([
                "amount" => "required|numeric|min:1|max:1000"
            ]);
        } 

        $validatedData["user_id"] = auth()->user()->id;

        Cart::where("id", $request->cart_id)
        ->update($validatedData);

        return redirect("/carts")->with("success", "Jumlah berhasil diperbarui!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cart $cart)
    {
        $this->authorize("buyer");
        Cart::destroy($cart->id);
        return redirect("/carts")->with("success", "Data berhasil dihapus!");
    }
}
