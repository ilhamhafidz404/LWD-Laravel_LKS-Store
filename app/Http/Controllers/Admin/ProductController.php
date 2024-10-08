<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products= Product::all();

        return view("admin.product.index", [
            "products" => $products
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view("admin.product.create", [
            "categories" => $categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $fileName= uniqid() . ".". $request->file("image")->getClientOriginalExtension();

        $request->file("image")->storeAs("products", $fileName, "public");

        Product::create([
            "name" => $request->name,
            "category_id" => $request->category,
            "image" => $fileName,
            "description" => $request->description,
            "price" => $request->price,
        ]);

        return redirect()->route("products.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product= Product::find($id);

        return view("admin.product.show", [
            "product" => $product,
        ]); 
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product= Product::find($id);
        $categories = Category::all();

        return view("admin.product.edit", [
            "product" => $product,
            "categories" => $categories,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        if($request->hasFile("image")){
            
            $fileName= uniqid() . ".". $request->file("image")->getClientOriginalExtension();

            $request->file("image")->storeAs("products", $fileName, "public");

            Product::find($id)->update([
                "name" => $request->name,
                "category_id" => $request->category,
                "image" => $fileName,
                "description" => $request->description,
                "price" => $request->price,
            ]);
        }  else{
            Product::find($id)->update([
                "name" => $request->name,
                "category_id" => $request->category,
                "description" => $request->description,
                "price" => $request->price,
            ]);
        }

        return redirect()->route("products.index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Product::find($id)->delete();

        return redirect()->back();
    }
}
