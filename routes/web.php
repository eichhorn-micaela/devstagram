<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ImagenController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ComentarioController;
use App\Http\Controllers\Auth\logoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\FollowersController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PerfilController;

Route::get('/', HomeController::class)->name('home');


Route::get('/crear-cuenta', [RegisterController::class, 'index'])->name('register');
Route::post('/crear-cuenta', [RegisterController::class, 'store']);

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store']);

Route::post('/logout', [logoutController::class, 'store'])->name('logout');





Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
Route::post('/post', [PostController::class, 'store'])->name('posts.store');
Route::get('/{user:username}/posts/{post}', [PostController::class, 'show'])->name('posts.show');
Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');

Route::post('/{user:username}/post/{post}', [ComentarioController::class, 'store'])->name('comentarios.store');



Route::post('/imagenes', [ImagenController::class, 'store'])->name('imagenes.store');

//like a las fotos
Route::post('/posts/{post}/likes', [LikeController::class, 'store'])->name('posts.likes.store');

Route::delete('/posts/{post}/dislikes', [LikeController::class, 'destroy'])->name('posts.likes.destroy');


//rutas para el perfil
Route::get('/editar-perfil', [PerfilController::class, 'index'])->name('perfil.index');
Route::post('/editar-perfil', [PerfilController::class, 'store'])->name('perfil.store');
Route::get('/cambiar-password', [PerfilController::class, 'changePassword'])->name('perfil.password');
Route::post('/cambiar-password', [PerfilController::class, 'updatePassword'])->name('password.update');


Route::get('/{user:username}', [PostController::class, 'index'])->name('posts.index');


//siguiendo usuarios
Route::post('/{user:username}/follow', [FollowersController::class, 'store'])->name('users.follow');
Route::delete('/{user:username}/unfollow', [FollowersController::class, 'destroy'])->name('users.unfollow');




