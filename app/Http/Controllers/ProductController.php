<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        return view("shared.products", [
            "products" => Product::paginate(5)->withQueryString()
        ]);
    }

    public function show(Product $product){
        return view("shared.product", [
            "product" => $product,
        ]);
    }
}
