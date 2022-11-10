@extends('layouts.app')

@section('titulo')
    Perfil de: {{$user->username}}
@endsection

@section('contenido')
    <div class="flex justify-center ">
        <div class="w-full md:w-8/12 lg:w-6/12 flex flex-col  items-center md:flex-row">
            <div class="w-8/12 lg:w-6/12 px-5 ">
            @if ($user->avatar != null)
               <img class="rounded-full" src="{{ asset('perfiles'). '/' . $user->avatar }}"/>
            @else
               <img src="img/usuario.svg" alt="">
            @endif

            </div>
            <div class="md:w-8/12 lg:w-8/12 px-5 py-5 flex flex-col  justify-center">
                 <div class="flex gap-2 items-center mb-5">
                  <p class="text-gray-700 text-2xl ">
                    {{$user->username}}
                  </p>
                   @auth
                     @if ($user->id === auth()->user()->id)
                       <a href="{{ route('perfil.index') }}" class="text-gray-500 hover:text-gray-600 cursor-pointer">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-3 h-4">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125" />
                        </svg>

                      </a>
                     @endif
                   @endauth
                  </div>
                  <p class="text-gray-800 text-sm mb-3 font-bold">
                   {{$user->followers()->count()}}
                    <span class="font-normal">@choice('seguidor|seguidores', $user->followers()->count())</span>
                  </p>
                  <p class="text-gray-800 text-sm mb-3 font-bold">
                    {{$user->following()->count()}}
                    <span class="font-normal">Siguiendo</span>
                  </p>
                  <p class="text-gray-800 text-sm mb-3 font-bold">
                    {{$user->posts->count()}}
                    <span class="font-normal">Posts</span>
                  </p>
                   @auth
                   @if($user->id !== auth()->user()->id)
                      @if(!$user->siguiendo(auth()->user()))

                       <form action="{{route('users.follow', $user)}}" method="post">
                      @csrf
                      <input type="submit" class="bg-blue-600 text-white uppercase rounded-lg px-3 py-1 text-xs font-bold cursor-pointer"
                      value="Seguir"/>
                  </form>
                   @else
                  <form action="{{route('users.unfollow', $user)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <input type="submit" class="bg-red-600 text-white uppercase rounded-lg px-3 py-1 text-xs font-bold cursor-pointer"
                    value="Dejar de seguir"/>
                </form>
                @endif
                @endif
            @endauth

            </div>
        </div>
    </div>
    <section class="container mx-auto my-10">
       <h2 class="text-4xl text-center my-10 font-black">
          Publicaciones
       </h2>

       <x-listar-post :posts="$posts"/>

    </section>
@endsection