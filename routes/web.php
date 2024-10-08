<?php

use App\Http\Controllers\Admin\AuthController as AdminAuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\TransactionController as AdminTransactionController;

// 
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\TransactionController;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// USER
Route::get('/', function (Request $request) {
    $products= Product::where("name", "LIKE", "%".$request->search."%")->get();

    return view('welcome', [
        "products" => $products
    ]);
})->name("welcome");

Route::resource("/carts", CartController::class);
Route::resource("/transactions", TransactionController::class);

Route::get("/register", [AuthController::class, 'register'])->name('register');
Route::post("/register", [AuthController::class, 'registration'])->name('registration');

Route::get("/login", [AuthController::class, 'login'])->name('login');
Route::post("/login", [AuthController::class, 'authenticate'])->name('authenticate');

Route::post("/logout", [AuthController::class, 'logout'])->name('logout');

// ADMIN
Route::get(
    "/admin/login", 
    [AdminAuthController::class, 'login']
)->name("adminLogin");

Route::post(
    "/admin/login", 
    [AdminAuthController::class, 'authenticate']
)->name("adminAuthenticate");

Route::get("/admin/dashboard", DashboardController::class);
Route::resource("/admin/products", ProductController::class);
Route::get("/admin/transactions", AdminTransactionController::class);

// Route::get("/", [StudentControler::class, "index"]);
// Route::resource("/student", StudentControler::class)->middleware("auth");
// Route::resource("/classroom", ClassroomController::class)->middleware("auth");
    
// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
