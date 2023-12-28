<?php

namespace App\Http\Controllers;
use Cviebrock\EloquentSluggable\Services\SlugService;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class SellerProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize("seller");

        return view("seller.products.products", [
            "title" => "Product",
            "products" => Product::with(["user", "category"])->where("user_id", auth()->user()->id)->where("status", 1)->paginate(5)->withQueryString()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize("seller");
        return view("seller.products.create", [
            "title" => "Create New Product",
            "categories" => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->authorize("seller");
        $validatedData = $request->validate([
            "name" => "required|max:255",
            "slug" => "required",
            "price" => "required|numeric",
            "category_id" => "required",
            "excerpt" => "required",
            "description" => "required|max:5000",
            "image" => "required|image|file|max:1024"
        ]);
        $validatedData["user_id"] = auth()->user()->id;
        $validatedData["image"] = $request->file("image")->store("product-images");

        Product::create($validatedData);
        return redirect('/seller/dashboard/products')->with('success', 'Produk baru berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        $this->authorize("seller");
        return view("seller.products.show", [
            "title" => $product->name,
            "product" => $product,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $this->authorize("seller");

        return view("seller.products.edit", [
            "title" => "Edit Product",
            "product" => $product,
            "categories" => Category::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $this->authorize("seller");

        $rules = [
            "name" => "required|max:255",
            "price" => "required|numeric",
            "category_id" => "required",
            "excerpt" => "required",
            "description" => "required|max:5000",
        ];

        if($request->slug != $product->slug){
            $rules["slug"] = "required|unique:products";
        }
        $validatedData = $request->validate($rules);

        if($request->file("image")){
            if($request->oldImage){
                Storage::delete($request->oldImage);
            }
            
            $validatedData["image"] = $request->file("image")->store("product-images");
        }
        $validatedData["user_id"] = auth()->user()->id;

        Product::where('id', $product->id)
            ->update($validatedData);

            return redirect('/seller/dashboard/products')->with('success', 'Produk berhasil diperbarui');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        // $this->authorize("seller");

        // if($product->image){
        //     Storage::delete($product->image);
        // }

        // Product::destroy($product->id);

        // return redirect('/seller/dashboard/products')->with('success', 'Product has been deleted!');

        $this->authorize("seller");

        $product = Product::where("id", $product->id)
                    ->update(["status" => 0]);

        return redirect('/seller/dashboard/products')->with('success', 'Produk berhasil dihapus!');
    }

    public function checkSlug(Request $request){
        $this->authorize("seller");
        $slug = SlugService::createSlug(Product::class, 'slug', $request->name);
        return response()->json(['slug'=>$slug]);
    }
}
