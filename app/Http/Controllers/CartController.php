<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $products = Cart::where("user_id", 1)->get();
        $products = Cart::whereUserId(Auth::user()->id)->get();

        return view("customer.cart", [
            "products" => $products
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

        $cart= Cart::whereUserId(Auth::user()->id)->whereProductId($request->product)->get();

        if(!$cart->count()) {
            Cart::create([
                "user_id" => Auth::user()->id,
                "product_id" => $request->product
            ]);
        }

        return redirect()->route("carts.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Cart::find($id)->delete();

        return redirect()->back();
    }
}
