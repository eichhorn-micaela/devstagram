@extends('layouts.app')

@section('titulo')
    Crea una nueva publicacion
@endsection

@push('styles')
<link href="https://unpkg.com/dropzone@6.0.0-beta.1/dist/dropzone.css" rel="stylesheet" type="text/css" />
@endpush
@push('scripts')
<script src="https://unpkg.com/dropzone@6.0.0-beta.1/dist/dropzone-min.js"></script>

@endpush

@section('contenido')
@if (session('mensaje'))
<p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{session('mensaje')}}
</p>
@endif
 <div class="md:flex md:items-center md:justify-center">
        <div class="md:w-1/2 p-5">
              <form action="{{route('imagenes.store')}}" method="POST"  enctype="multipart/form-data" id="dropzone" class="dropzone border-dashed border-2 w-full h-96 rounded flex flex-col justify-center items-center">
                @csrf
             </form>     
        </div>
    
        <div class="md:w-1/2 p-5 items-center justify-center mt-10 md:mt-0 bg-white shadow-md rounded-md ">
         
         <form action="{{route('posts.store')}}" method="post" novalidate>
             @csrf
             
            <div class="mb-5">
                <label for="titulo"  class="mb-2 block uppercase text-gray-500 font-bold ">Titulo</label>
                <input type="text" name="titulo" class="border p-3 w-full rounded-md @error('titulo')
                border-red-500
                @enderror"
                value={{old('titulo')}}>
                @error('titulo')
                <p class="bg-red-500 text-white my-2 rounded-md text-sm text-center p-2"> {{$message}}</p>
                @enderror
            </div>  
                
                <div class="mb-5">
                    <label for="descripcion"  class="mb-2 block uppercase text-gray-500 font-bold ">Descripcion</label>
                    <textarea
                    id="descripcion"
                    name="descripcion"
                    placeholder="Descripcion"
                    cols="30" rows="10"
                    class="border p-3 w-full rounded-md @error('descripcion')
                    border-red-500
                    @enderror" >
                    {{old('descripcion')}}
                    </textarea>
                     @error('descripcion')
                    <p class="bg-red-500 text-white my-2 rounded-md text-sm text-center p-2"> {{$message}}</p>
                    @enderror
                </div>
                <div class="mb-5">
                    <input type="hidden" name="imagen"value="{{ old('imagen')}}">
                    
                    @error('imagen')
                    <p class="bg-red-500 text-white my-2 rounded-md text-sm text-center p-2"> {{$message}}</p>
                    @enderror
                </div>
                
                
                <input 
                type="submit" 
                value="Crear post"
                class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-md"
                >
               
            </form>
        </div>
    
    </div>
@endsection