@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <!-- Texte de bienvenue -->
    <div class="welcome-text text-center mb-4">
        <h1>Bienvenue sur Amazone !</h1>
        <p>Découvrez nos collections exclusives et profitez de nos offres spéciales.</p>
    </div></br>

    <!-- Titre "Articles du moment" -->
    <h2 class="text-center mb-4">Articles du moment</h2>

    <!-- Carousel -->
    @if ($featuredProducts->isNotEmpty())
    <div id="carouselExampleIndicators" class="carousel slide carousel-container" data-ride="carousel" style="max-height: 400px;">
        <ol class="carousel-indicators">
            @foreach ($featuredProducts as $key => $product)
            <li data-target="#carouselExampleIndicators" data-slide-to="{{ $key }}" class="{{ $key == 0 ? 'active' : '' }}"></li>
            @endforeach
        </ol>
        <div class="carousel-inner">
            @foreach ($featuredProducts as $key => $product)
            <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                <a href="{{ route('products.show', ['id' => $product->id]) }}">
                    <img class="d-block w-100 custom-carousel-img" src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}">
                </a>
                <div class="carousel-caption d-none d-md-block">
                    <h5>{{ $product->name }}</h5>
                    <p>{{ Str::limit($product->description, 100, '...') }}</p> <!-- Limite à 100 caractères -->
                </div>
            </div>
            @endforeach
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    @endif

    <!-- Promotions Section -->
    <div class="row mt-4">
        <div class="col-md-4">
            <div class="card">
                <img class="card-img-top" src="{{ asset('images/promo1.png') }}" alt="Promotion 1">
                <div class="card-body">
                    <h5 class="card-title">Offre Spéciale: 20% de réduction sur les nouvelles collections</h5>
                    <p class="card-text">Profitez de 20% de réduction sur les nouveaux articles de la saison. Offre valable jusqu'à fin du mois.</p>
                    <a href="{{ route('products.index') }}" class="btn btn-primary">En savoir plus</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <img class="card-img-top" src="{{ asset('images/promo2.png') }}" alt="Promotion 2">
                <div class="card-body">
                    <h5 class="card-title">Livraison Gratuite pour les commandes de plus de 50€</h5>
                    <p class="card-text">Bénéficiez de la livraison gratuite pour toute commande supérieure à 50€. Commandez maintenant et économisez sur les frais de port.</p>
                    <a href="{{ route('products.index') }}" class="btn btn-primary">En savoir plus</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <img class="card-img-top" src="{{ asset('images/promo3.png') }}" alt="Promotion 3">
                <div class="card-body">
                    <h5 class="card-title">Achetez-en 2, Obtenez-en 1 Gratuit</h5>
                    <p class="card-text">Pour une durée limitée, achetez deux articles et obtenez le troisième gratuitement. Ne manquez pas cette offre incroyable.</p>
                    <a href="{{ route('products.index') }}" class="btn btn-primary">En savoir plus</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
