<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("customer.transaction");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $generateInvoice = "INV" . date("Ymd") . Str::random(3);

        $transaction = Transaction::create([
            "customer_id" => 1,
            "date" => now(),
            "invoice" => $generateInvoice
        ]);

        TransactionDetail::create([
            "product_id" => $request->product_id,
            "transaction_id" => $transaction->id,
            "total" => $request->qty
        ]);

        $cart = Cart::whereProductId($request->product_id)->whereUserId(1)->first();
        $cart->delete();

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
        //
    }
}
