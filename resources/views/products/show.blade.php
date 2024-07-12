@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-6">
            <img src="{{ asset('storage/' . $product->image) }}" class="img-fluid" alt="{{ $product->name }}">
        </div>
        <div class="col-md-6">
            <h1>{{ $product->name }}</h1>
            <p>{{ $product->description }}</p>
            <p><strong>Category:</strong> {{ $product->category }}</p>
            <p><strong>Price:</strong> ${{ $product->price }}</p>
            
            @auth {{-- Vérifie si l'utilisateur est connecté --}}
                <form action="{{ route('cart.add') }}" method="POST">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <button type="submit" class="btn btn-primary">Ajouter au panier</button>
                </form>
            @else
                <p><a href="{{ route('login') }}" class="btn btn-primary">Se connecter pour ajouter au panier</a></p>
            @endauth
            
        </div>
    </div>
</div>
@endsection
