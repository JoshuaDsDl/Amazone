@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1>Vote panier</h1>
    @if(session('cart'))
    <ul class="list-group mb-4">
        @foreach(session('cart') as $id => $item)
        <li class="list-group-item d-flex justify-content-between align-items-center">
            <div>
                <h2>{{ $item['name'] }}</h2>
                <p>Quantité : {{ $item['quantity'] }}</p>
                <p>Prix : ${{ $item['price'] }}</p>
            </div>
            <div>
                <form action="{{ route('cart.remove') }}" method="POST">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $item['id'] }}">
                    <button type="submit" class="btn btn-danger">
                        <i class="fas fa-trash"></i> Remove
                    </button>
                </form>
            </div>
        </li>
        @endforeach
    </ul>
    <h3>Total : {{ $total }}€</h3>
    <div class="text-right">
        <a href="{{ route('checkout') }}" class="btn btn-primary">Payer</a>
    </div>
    @else
    <p>Votre panier est vide.</p>
    @endif
</div>
@endsection
