@extends('layouts.app')


@section('titulo')
    Cambiar password: {{ auth()->user()->username }}
@endsection

@section('contenido')
 <div class="md:flex  mt-3 md:justify-center md:gap-3 md:items-center ">
    <div class="md:w-6/12 p-5 bg-white shadow-md rounded-md">

         <form class="mt-10 md:mt-0" method="post" action="{{route('password.update')}}" >
            @csrf
            @if (session('mensaje'))
            <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{session('mensaje')}}
            </p>
              @endif

                <div class="mb-5">

                    <label for="old_password"  class="mb-2 block uppercase text-gray-500 font-bold ">Password antigua</label>
                    <input
                    type="password"
                    id="old_password"
                    name="old_password"
                    placeholder="Tu contraseña"
                    class="border p-3 w-full rounded-md @error('old_password')
                    border-red-500
                    @enderror"
                    value={{old('old_password')}}
                     >
                     @error('old_password')
                    <p class="bg-red-500 text-white my-2 rounded-md text-sm text-center p-2"> {{$message}}</p>
                    @enderror
                </div>
                <div class="mb-5">
                    <label for="new_password"  class="mb-2 block uppercase text-gray-500 font-bold ">
                      Nueva password
                    </label>
                    <input
                    type="password"
                    id="new_password"
                    name="new_password"
                    placeholder="Contraseña nueva"
                    class="border p-3 w-full rounded-md @error('new_password')
                    border-red-500 @enderror"
                     value={{old('new_password')}}

                     >
                     @error('new_password')
                    <p class="bg-red-500 text-white my-2 rounded-md text-sm text-center p-2"> {{$message}}</p>
                    @enderror
                </div>
                <div class="mb-5">
                    <label for="new_password_confirmation"  class="mb-2 block uppercase text-gray-500 font-bold ">
                        Repetir password
                    </label>
                    <input
                    type="password"
                    id="new_password_confirmation"
                    name="new_password_confirmation"
                    placeholder="Repite tu contraseña"
                    class="border p-3 w-full rounded-md @error('new_password_confirmation')
                    border-red-500
                    @enderror"
                    value={{old('new_password_confirmation')}}
                     >
                     @error('new_password_confirmation')
                    <p class="bg-red-500 text-white my-2 rounded-md text-sm text-center p-2"> {{$message}}</p>
                    @enderror
                </div>
                <input
                type="submit"
                value="Cambiar password"
                class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-md"
                />
         </form>
    </div>

</div>
@endsection
