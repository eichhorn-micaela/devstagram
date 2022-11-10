<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @stack('styles')

        <title>Devstagram - @yield('titulo')</title>
        @vite('resources/css/app.css')
        @vite('resources/js/app.js')
        @livewireStyles
        
    </head>
    <body class="bg-gray-100">
        <header class="p-5 border-b bg-white shadow ">
         <div class="container mx-auto flex flex-col md:flex-row md:justify-between items-center ">
            <a href="{{route('home')}}" class="text-3xl font-black sm:mb-5">

                    Devstagram


            </a>
            @guest
            <nav class="flex gap-2 items-center">
                <a href="{{route('login')}}" class="font-bold uppercase text-gray-600 text-sm">Login</a>
                <a href="{{route('register')}}" class="font-bold uppercase text-gray-600 text-sm">Crear cuenta</a>
            </nav>
            @endguest

            @auth

              <nav class="flex gap-2 items-center  ">
                <a href="{{route('posts.create')}}" class="flex items-center gap-2 bg-white border p-2 text-gray-600 rounded text-sm uppercase fond-bold cursor-poiter">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6.827 6.175A2.31 2.31 0 015.186 7.23c-.38.054-.757.112-1.134.175C2.999 7.58 2.25 8.507 2.25 9.574V18a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18V9.574c0-1.067-.75-1.994-1.802-2.169a47.865 47.865 0 00-1.134-.175 2.31 2.31 0 01-1.64-1.055l-.822-1.316a2.192 2.192 0 00-1.736-1.039 48.774 48.774 0 00-5.232 0 2.192 2.192 0 00-1.736 1.039l-.821 1.316z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 12.75a4.5 4.5 0 11-9 0 4.5 4.5 0 019 0zM18.75 10.5h.008v.008h-.008V10.5z" />
                      </svg>

                    Crear
                </a>

                <span  class="flex gap-2 justify-center items-center  text-sm font-medium text-gray-500 ">
                    @if (auth()->user()->avatar != null)
               <img class="rounded-full" src="{{ asset('perfiles'). '/' . auth()->user()->avatar }}" width="50"/>
            @else
               <img src="img/usuario.svg" alt="" width="50">
            @endif

                    <a href="{{route('posts.index' , auth()->user()->username)}}" class="font-normal">
                    {{auth()->user()->username}}
                    </a>
                    <form method="POST" action="{{route('logout')}}" >
                    @csrf
                     <button type="submit" class="font-bold bg-white  text-gray-600 text-sm uppercase" > Cerrar sesion
                     </button>
                    </form>
                </span>



              </nav>
            @endauth

          </div>
        </header>
         <main class="container mx-auto my-10 ">
            <h2 class="font-black text-center text-3xl mb-10">
                @yield('titulo')
            </h2>

            @yield('contenido')
         </main>
         <footer class="text-center text-white p-5  font-bold uppercase bg-black mt-11">
             Devstagram - Todos los derechos reservados {{ now()->year}}
         </footer>

         @livewireScripts
        </body>
        @stack('scripts')
    </head>
