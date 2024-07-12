@extends('layouts.app')

@section('title', 'Créer un article')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Créer un article</div>

                <div class="card-body">
                    <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="name">Nom :</label>
                            <input type="text" id="name" name="name" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="description">Description :</label>
                            <textarea id="description" name="description" class="form-control" rows="5" required></textarea>
                        </div>

                        <div class="form-group">
                            <label for="price">Prix :</label>
                            <input type="text" id="price" name="price" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="category">Catégorie :</label>
                            <input type="text" id="category" name="category" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="image">Image :</label>
                            <input type="file" id="image" name="image" class="form-control-file" required>
                        </div>

                        <button type="submit" class="btn btn-primary">Créer</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
