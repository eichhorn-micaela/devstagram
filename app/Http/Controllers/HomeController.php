<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function __invoke(){
        //OBTENER A QUIENES SEGUIMOS
         $ids= auth()->user()->following->pluck('id')->toArray();
         $posts = Post::wherein('user_id', $ids)->latest()->paginate(20);

          return view('home',[
              'posts' => $posts
          ]);


    }
}
