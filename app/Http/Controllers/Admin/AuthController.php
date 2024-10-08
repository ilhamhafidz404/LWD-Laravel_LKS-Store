<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(){
        return view("admin.login");
    }

    public function authenticate(Request $request){
        $admin= 
            Admin::whereEmail($request->email)
                ->wherePassword($request->password)
                ->first();

        if($admin){
            return redirect("/admin/dashboard");
        } 
        
        return "salah";
    }
}


// <?php

// namespace App\Http\Controllers;

// use App\Models\User;
// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Auth;

// class AuthController extends Controller
// {
//     public function index()
//     {
//         return view("customer.login");
//     }

//     public function authenticate(Request $request)
//     {
//         // Validasi input
//         $credentials = $request->validate([
//             'email' => 'required|email',
//             'password' => 'required'
//         ]);

//         if (Auth::attempt($credentials)) {
//             $request->session()->regenerate();

//             return response()->json(['message' => 'Login successful hello '. auth()->user()->name], 200);
//         }
//         return response()->json(['message' => 'Invalid credentials'], 401);
//     }

//     public function logout(Request $request)
//     {
//         // *Logout* user dari session
//         Auth::logout();

//         // Invalidate session untuk keamanan
//         $request->session()->invalidate();

//         // Regenerate CSRF token untuk mencegah CSRF attacks
//         $request->session()->regenerateToken();

//         // Berikan response atau redirect jika diperlukan
//         return response()->json(['message' => 'Logout successful'], 200);
//     }
// }

