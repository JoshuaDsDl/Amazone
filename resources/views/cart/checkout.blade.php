@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1>Paiement</h1>
    <form action="{{ route('checkout.process') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Nom sur la carte bleue</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="address">Adresse de livraison</label>
            <input type="text" name="address" id="address" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="card_number">Numéro de carte bleue</label>
            <input type="text" name="card_number" id="card_number" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="expiration_date">Date d'expiration</label>
            <input type="text" name="expiration_date" id="expiration_date" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="cvv">CVV</label>
            <input type="text" name="cvv" id="cvv" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Payer</button>
    </form>
</div>
@endsection
