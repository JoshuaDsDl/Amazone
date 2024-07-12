@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $product->name }}</h1>
    <p>{{ $product->description }}</p>
    <p>Prix : ${{ $product->price }}</p>
    <p>Catégorie : {{ $product->category }}</p>
    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" width="300">
</div>
@endsection
