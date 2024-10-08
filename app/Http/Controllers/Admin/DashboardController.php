<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Transaction;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $productCount = Product::count();
        $transactionCount = Transaction::count();

        return view("admin.dashboard", compact('productCount', 'transactionCount'));
    }
}
