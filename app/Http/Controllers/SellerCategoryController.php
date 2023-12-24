<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;

class SellerCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize("seller");
        return view("seller.categories.categories", [
            "title" => "Categories",
            "categories" => Category::where("status", 1)->paginate(5)->withQueryString()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize("seller");
        return view("seller.categories.create", [
            "title" => "Create New Category"
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->authorize("seller");
        $validatedData = $request->validate([
            "name" => "required|max:50|unique:categories",
            "slug" => "required|unique:categories"
        ]);

        Category::create($validatedData);

        return redirect('/seller/dashboard/categories')->with('success', 'New category has been added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        $this->authorize("seller");
        if($category->status == 0){
            return redirect("seller/dashboard/categories");
        }
        return view("seller.categories.edit", [
            "title" => $category->name,
            "category" => $category
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $this->authorize("seller");
        if($request->name != $category->name){
            $rules["name"] = "required|max:50|unique:categories";
            $rules["slug"] = "required|unique:categories";
        } else{
            return redirect('/seller/dashboard/categories/'.$category->slug.'/edit')->with('nodata', 'tidak ada perubahan data');
        }
        $validatedData = $request->validate($rules);
        Category::where('id', $category->id)
            ->update($validatedData);

        return redirect('/seller/dashboard/categories')->with('success', 'category has been updated!');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        // $this->authorize("seller");
        // Category::destroy($category->id);
        // return redirect('/seller/dashboard/categories')->with('success', 'Category has been deleted!');

        $this->authorize("seller");
        Category::where("id", $category->id)
                    ->update(["status" => 0]);
        return redirect("/seller/dashboard/categories")->with("success", "data berhasil dihapus");
    }

    public function checkSlug(Request $request){
        $this->authorize("seller");
        $slug = SlugService::createSlug(Category::class, 'slug', $request->name);
        return response()->json(['slug'=>$slug]);
    }
}
