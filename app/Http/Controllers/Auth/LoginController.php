<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    public function index() {
        return view('auth.login');
    }
    public function store(Request $request) {


        
        $request->validate([
            
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);
       
        if (!auth()->attempt($request->only('email', 'password'), $request->remember)) {
           return back()->with('mensaje', 'Credenciales incorrectas');
        }
        
        
        return redirect()->route('posts.index', [
           'user' => auth()->user()->username,
            
        ]);
      
    }

}
