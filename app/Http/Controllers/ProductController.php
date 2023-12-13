<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        return view("shared.products", [
            "title" => "Products",
            "products" => Product::paginate(9)->withQueryString()
        ]);
    }

    public function show(Product $product){
        return view("shared.product", [
            "title" => $product->name,
            "product" => $product,
        ]);
    }
}
