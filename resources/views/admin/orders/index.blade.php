@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1>Gérer les commandes</h1>
    <table class="table">
        <thead>
            <tr>
                <th>ID de commande</th>
                <th>Utilisateur</th>
                <th>Total</th>
                <th>Statut</th>
                <th>Articles</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->user->name ?? 'N/A' }}</td>
                    <td>${{ $order->total }}</td>
                    <td>{{ $order->status }}</td>
                    <td>
                        <ul>
                            @foreach($order->products as $product)
                                <li>{{ $product->name }} ({{ $product->pivot->quantity }} x ${{ $product->pivot->price }})</li>
                            @endforeach
                        </ul>
                    </td>
                    <td>
                        <!-- Bouton pour la suppression de la commande -->
                        <a href="{{ route('admin.orders.destroy', $order->id) }}"
                           onclick="event.preventDefault(); if(confirm('Êtes vous certain de vouloir la supprimer ?')) { document.getElementById('delete-form-{{ $order->id }}').submit(); }">
                            <i class="fas fa-trash-alt"></i>
                        </a>
                        <!-- Formulaire masqué pour la suppression -->
                        <form id="delete-form-{{ $order->id }}" action="{{ route('admin.orders.destroy', $order->id) }}" method="POST" style="display: none;">
                            @csrf
                            @method('DELETE')
                        </form>

                        <!-- Sélecteur pour le statut de la commande -->
                        <select name="status" onchange="if(confirm('Êtes vous certain de vouloir changer le statut ?')) { this.form.submit(); }">
                            <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="processed" {{ $order->status == 'processed' ? 'selected' : '' }}>Processed</option>
                        </select>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
