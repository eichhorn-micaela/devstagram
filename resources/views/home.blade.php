@extends('layouts.app')

@section('titulo')
  DEVSTAGRAM
@endsection

@section('contenido')

  <x-listar-post :posts="$posts"/>

   
@endsection
