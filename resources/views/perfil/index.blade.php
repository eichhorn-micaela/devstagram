@extends('layouts.app')


@section('titulo')
    Editar perfil: {{ auth()->user()->username }}
@endsection

@section('contenido')
 <div class="md:flex  mt-3 md:justify-center md:gap-3 md:items-center ">
    <div class="md:w-6/12 p-5 bg-white shadow-md rounded-md">

         <form class="mt-10 md:mt-0" method="post" action="{{route('perfil.store')}}" enctype="multipart/form-data" >
            @csrf
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
                    value={{ auth()->user()->username}}
                     />
                     @error('username')
                    <p class="bg-red-500 text-white my-2 rounded-md text-sm text-center p-2"> {{$message}}</p>
                    @enderror
                </div>
                <div class="mb-5">



                    <label for="imagen"  class="mb-2 block uppercase text-gray-500 font-bold ">Imagen perfil</label>

                    <img src="{{ asset('perfiles'). '/'. auth()->user()->avatar }}" width="60"/>
                    <input
                    type="file"
                    id="iamgen"
                    name="imagen"
                    class="border p-3 w-full rounded-md "
                    accept=".jpg, .jpeg, .png, .gif"
                     />

                </div>

                <div class="mb-5">
                    <a class="fond-bold text-sm" href="{{route('perfil.password')}}" >¿Deseas cambiar el password?</a>
                </div>

                <input
                type="submit"
                value="Editar perfil"
                class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-md"
                />
         </form>
    </div>

</div>
@endsection
