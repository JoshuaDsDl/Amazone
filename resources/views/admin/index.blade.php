@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Interface d'administration</h1>
    <ul class="list-group">
        <li class="list-group-item">
            <a href="{{ route('admin.products.index') }}">Gérer les articles</a>
        </li>
        <li class="list-group-item">
            <a href="{{ route('admin.orders.index') }}">Gérer les commandes</a>
        </li>
    </ul>
</div>
@endsection
