<?php

namespace App\Http\Controllers;

use App\Models\Employers;
use App\Models\Stok;
use Illuminate\Http\Request;
// use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function loginSucces()
    {
        return view('landing_page', [
            "tittle" => "Landing Page",
            "employer" => Employers::all()->count(),
            "stok" => Stok::all()->count()
        ]);
    }
    
    public function index()
    {
        return view('login', [
            "tittle" => "LOG IN"
        ]);
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            return redirect()->intended('/')->with('message', 'Anda Berhasil Login. Selamat datang '. auth()->user()->name . '!!');
        }

        return back()->with('loginEror', 'Login Failed');
    }

    public function logout()
    {
        Auth::logout();
    
        request()->session()->invalidate();
    
        request()->session()->regenerateToken();
    
        return redirect('/login');
    }
}
