@extends('layouts.app')

@section('titulo')
    Registrate en devstagram
@endsection

@section('contenido')
    <div class="md:flex  mt-3 md:justify-center md:gap-3 md:items-center ">
         <div class="md:w-8/12  p-5">
            <img src="{{asset('img/registrar.jpg')}}" alt="imagen de registro" >
        </div>
        <div class="md:w-6/12 p-5 bg-white shadow-md rounded-md">
           
            <form action="{{route('register')}}" method="post" novalidate>
             @csrf

                <div class="mb-5">
                    <label for="name"  class="mb-2 block uppercase text-gray-500 font-bold ">Nombre</label>
                    <input 
                    type="text"
                    id="name"
                    name="name"
                    placeholder="Tu nombre"
                    class="border p-3 w-full rounded-md @error('name')
                        border-red-500
                    @enderror"
                    value={{old('name')}}
                    >
                    @error('name')
                        <p class="bg-red-500 text-white my-2 rounded-md text-sm text-center p-2"> {{$message}}</p>
                    @enderror
                </div>
                <div class="mb-5">
                    <label for="username"  class="mb-2 block uppercase text-gray-500 font-bold ">Username</label>
                    <input 
                    type="text"
                    id="username"
                    name="username"
                    placeholder="Tu nombre de usuario"
                    class="border p-3 w-full rounded-md @error('username')
                    border-red-500
                    @enderror"
                    value={{old('username')}}
                     >
                     @error('username')
                    <p class="bg-red-500 text-white my-2 rounded-md text-sm text-center p-2"> {{$message}}</p>
                    @enderror
                </div>
                <div class="mb-5">
                    <label for="email"  class="mb-2 block uppercase text-gray-500 font-bold ">Email</label>
                    <input 
                    type="email"
                    id="email"
                    name="email"
                    placeholder="Tu email"
                    class="border p-3 w-full rounded-md @error('email')
                    border-red-500
                    @enderror"
                    value={{old('email')}}
                     >
                     @error('email')
                    <p class="bg-red-500 text-white my-2 rounded-md text-sm text-center p-2"> {{$message}}</p>
                    @enderror
                </div>
                <div class="mb-5">
                    <label for="password"  class="mb-2 block uppercase text-gray-500 font-bold ">Password</label>
                    <input 
                    type="password"
                    id="password"
                    name="password"
                    placeholder="Tu contraseña"
                    class="border p-3 w-full rounded-md @error('password')
                    border-red-500
                    @enderror"
                    value={{old('password')}}
                     >
                     @error('password')
                    <p class="bg-red-500 text-white my-2 rounded-md text-sm text-center p-2"> {{$message}}</p>
                    @enderror
                </div>
                <div class="mb-5">
                    <label for="password_confirmation"  class="mb-2 block uppercase text-gray-500 font-bold ">
                        Repetir password
                    </label>
                    <input 
                    type="password"
                    id="password_confirmation"
                    name="password_confirmation"
                    placeholder="Repite tu contraseña"
                    class="border p-3 w-full rounded-md @error('password_confirmation')
                    border-red-500
                    @enderror"
                    value={{old('password_confirmation')}}
                     >
                     @error('password_confirmation')
                    <p class="bg-red-500 text-white my-2 rounded-md text-sm text-center p-2"> {{$message}}</p>
                    @enderror
                </div>
                <input 
                type="submit" 
                value="Crear cuenta"
                class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-md"
                >
               
            </form>
        </div>
    </div>
@endsection