@extends('layouts.app')

@section('titulo')
    {{$post->titulo}}
@endsection

@section('contenido')
    <div class="container mx-auto flex">
        <div class="md:w-1/2">
             <img src="{{asset('uploads'). '/'. $post->imagen}}" alt="imagen del post {{$post->titulo}}" >

            <div class="p-3 flex items-center gap-2">
               @auth

            <livewire:like-post :post="$post"/>


               @endauth

              
             </div>
             <div>
                 <p class="font-bold">{{$post->user->username}}
                 </p>
                <p class="text-sm text-gray-500">
                    {{$post->created_at->diffForHumans()}}
                </p>
                <p class="my-5">
                    {{$post->descripcion}}
                </p>
             </div>
           @auth
             @if ($post->user_id === auth()->user()->id)
                <form action="{{route('posts.destroy', ['post' => $post])}}" method="post">
                @method('DELETE')
                @csrf
                  <input
                  type="submit" value="Eliminar"
                  class="bg-red-500 hover:bg-red-600 p-2 rounded text-white text-center font-bold cursor-pointer"
                  >
                </form>
               @endif

           @endauth

            </div>


        <div class="md:w-1/2 p-5 ">
             <div class="shadow bg-white p-5 mb-5">
            @auth
                <p class="text-xl font-bold text-center mb-4">Agrega un nuevo comentario</p>

        @if (session('mensaje'))
                <p id="mensaje"
                class="bg-green-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{session('mensaje')}}
                </p>
        @endif

                <form action="{{route('comentarios.store', ['post' => $post, 'user' => $user])}}" method="POST">
                @csrf
                <div class="mb-5">
                    <label for="comentario"  class="mb-2 block uppercase text-gray-500 font-bold ">Añade tu comentario</label>
                    <textarea
                    id="comentario"
                    name="comentario"
                    placeholder="Comentario"
                    cols="10" rows="3"
                    class="border p-3 w-full rounded-md @error('comentario')
                    border-red-500
                    @enderror" >
                    {{old('comentario')}}
                    </textarea>
                     @error('comentario')
                    <p class="bg-red-500 text-white my-2 rounded-md text-sm text-center p-2"> {{$message}}</p>
                    @enderror
                </div>
                <input
                type="submit"
                value="Comentar"
                class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-md "
                >

                </form>
                @endauth

                <div class=" shadow  max-h-96 my-3 overflow-y-scroll">
                    @if ($post->comentarios->count())
                     @foreach ($post->comentarios as $comentario)

                        <p class=" mt-3 px-5 font-bold text-sm">
                            <a href="{{route('posts.index', $comentario->user)}}">{{$comentario->user->username}}
                            </a> - {{$comentario->created_at->diffForHumans()}}</p>
                         <p class="p-5 border-b-2 ">
                        {{$comentario->comentario}} </p>

                     @endforeach
                    @else

                    <p class="p-10 text-center">No hay comentarios</p>

                    @endif
                </div>
             </div>
        </div>


    </div>



@endsection
