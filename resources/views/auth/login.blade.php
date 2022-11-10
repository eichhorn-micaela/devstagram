@extends('layouts.app')

@section('titulo')
    Inicia sesion en devstagram
@endsection

@section('contenido')
    <div class="md:flex  mt-3 md:justify-center md:gap-3 md:items-center ">
         <div class="md:w-8/12  p-5">
            <img src="{{asset('img/login.jpg')}}" alt="imagen de login" >
        </div>
        <div class="md:w-6/12 p-5 bg-white shadow-md rounded-md">
           
            <form action="{{route('login')}}" method="post" novalidate>
             @csrf
                @if (session('mensaje'))
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{session('mensaje')}}
                    </p>
                @endif
                
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
                    <input type="checkbox" name="remember" > 
                    <label for="remember"  class="text-gray-500 text-sm ">
                        Mantener mi sesión abierta
                    </label>
                </div>
                <input 
                type="submit" 
                value="iniciar sesion"
                class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-md"
                >
               
            </form>
        </div>
    </div>
@endsection