<?php

namespace App\Http\Controllers\Auth;

use auth;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index() {
        return view('auth.register');
    }

    public function store(Request $request) {

        $request->validate([
            'name' => ['required', 'string', 'max:30'],
            'username' => ['required','min:3', 'max:20', 'unique:users'],
            'email' => ['required', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', 'min:6']
        ]);
        User::create([
            'name' => trim($request->name),
            'username' => Str::lower(trim($request->username)),
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);
        auth()->attempt([
            'email' => $request->email,
            'password' => $request->password

        ]);
        // otra forma de hacerlo = auth()->attempt($request->only('email', 'password'));


        return redirect()->route('posts.index', [
            'user' => auth()->user()->username,

        ]);
        

    }

}
