@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1>Articles</h1>
    @if(Auth::check() && Auth::user()->isAdmin())
        <a href="{{ route('admin.products.create') }}" class="btn btn-primary mb-3">Créer un nouvel article</a>
    @endif
    @foreach($products as $category => $categoryProducts)
        <div class="category-section mb-5">
            <h2>{{ $category }}</h2>
            <div class="row">
                @foreach($categoryProducts as $product)
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <img class="card-img-top" src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}">
                            <div class="card-body">
                                <h5 class="card-title">{{ $product->name }}</h5>
                                <p class="card-text">{{ $product->description }}</p>
                                <p class="card-text"><strong>${{ $product->price }}</strong></p>
                                <a href="{{ route('products.show', $product->id) }}" class="btn btn-primary">Voir détails</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endforeach
</div>
@endsection
