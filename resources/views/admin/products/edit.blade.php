@extends('layouts.app')

@section('title', 'Modifier un article')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Modifier un article</div>

                <div class="card-body">
                    <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="name">Nom :</label>
                            <input type="text" id="name" name="name" value="{{ $product->name }}" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="description">Description :</label>
                            <textarea id="description" name="description" class="form-control" rows="5" required>{{ $product->description }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="price">Prix :</label>
                            <input type="text" id="price" name="price" value="{{ $product->price }}" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="category">Catégorie :</label>
                            <input type="text" id="category" name="category" value="{{ $product->category }}" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="image">Image :</label>
                            <input type="file" id="image" name="image" class="form-control-file">
                            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" width="100">
                        </div>

                        <button type="submit" class="btn btn-primary">Mettre à jour</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
