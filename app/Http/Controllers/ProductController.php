<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        return view("shared.products", [
            "title" => "Products",
            "products" => Product::where("status", 1)->paginate(9)->withQueryString()
        ]);
    }

    public function show(Product $product){
        if($product->status == 0){
            return redirect("/products");
        }
        return view("shared.product", [
            "title" => $product->name,
            "product" => $product,
        ]);
    }
}
