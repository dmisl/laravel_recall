@extends('layouts.global')

@section('styles')

@vite(['resources/css/profile.css'])

@endsection

@section('content')

     @foreach ($products as $product)
          <div>
               <h1>{{ $product->title }}</h1>
          </div>
     @endforeach

@endsection