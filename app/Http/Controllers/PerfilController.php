<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;

class PerfilController extends Controller
{
    public function __construct()
    {
         $this->middleware('auth');
    }
   public function index(){
      return view('perfil.index');
   }
   public function store(Request $request){

    $request->request->add(['username' =>  Str::slug($request->username)]);

    $request->validate([
        'username' => ['required','min:3', 'max:20', 'unique:users,username,'.auth()->user()->id, 'not_in:twitter,editar-perfil,facebook '],


    ]);
    if($request->imagen){
        $imagen= $request->file('imagen');
        $nombreImagen= Str::uuid(). ".".$imagen->extension();

        $imagenServidor= Image::make($imagen);
        $imagenServidor->fit(1000, 1000);

        $imagenPath = public_path('perfiles/'). $nombreImagen;
        $imagenServidor->save($imagenPath);

    }



    //guardar cambios
       $usuario = User::find(auth()->user()->id);
       $usuario->username = $request->username;
       $usuario->avatar = $nombreImagen ?? auth()->user()->avatar ?? null;



       $usuario->save();


       return redirect()->route('posts.index', $usuario->username);
   }

   public function changePassword(){
     return view('perfil.cambiarpassword');
   }
   public function updatePassword(Request $request){
    $request->validate([
        'old_password' => ['required'],
        'new_password' => ['required', 'confirmed', 'min:6']
    ]);
    /*if (!auth()->attempt($request->only('password'), $request->remember)) {
        return back()->with('mensaje', 'Credenciales incorrectas');
     }*/
    if(!Hash::check($request->old_password, auth()->user()->password)){
          return back()->with('mensaje', 'La contraseña ingresada no es correcta');
    }

    $usuario = User::find(auth()->user()->id);
    $usuario->password = Hash::make($request->new_password);

    $usuario->save();


    return redirect()->route('posts.index', $usuario->username);
  }
}
