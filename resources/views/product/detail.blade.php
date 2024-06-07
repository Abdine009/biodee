 <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="icon" href=" {{asset('storage/images/favicon.png')}}">

        <title>Biode</title>

        <!-- bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">


        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <style>
            .product-image {
                width: 200px; /* Définissez la largeur désirée */
                height: 200px; /* Définissez la hauteur désirée */
                border-radius: 1%; /* Bordure arrondie */
                object-fit: cover; /* Empêche l'image de se déformer */
            }
            .no-border{
                    border : 0
                }
        </style>



    </head>
    <body>
                <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Biode</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                @auth
                    <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{route('dashboard')}}">Accueil</a>
                    </li>
                @endauth
                @guest
                    <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{route('display.products')}}">Accueil</a>
                    </li>
                @endguest
                <li class="nav-item">
                <a class="nav-link" href="#apropos">A propos de nous</a>
                </li>
               
            @guest
                <li class="nav-item">
                <a class="nav-link" href="{{route('auth.login')}}">Se connecter</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="{{route('user.create')}}">Créer un compte</a>
                </li>
            @endguest
                
            </ul>
            
            </div>
        </div>
    </nav>
           
<!-- Affichage des détails du produit -->
    <div class="card mb-3 my-5 mx-5 no-border" style="max-width: 540px;">
        <div class="row g-0">
            <div class="col-md-4">
            <img class="card-img-top product-image h-40 w-40" src="{{ asset('storage/images/' . $product->photo) }}" alt="Image du produit">
            </div>
            <div class="col-md-8">
            <div class="card-body mx-5">
                <h5 class="card-title">{{ $product->title }}</h5>
                <p class="card-text">Prix : {{ $product->price }} XOF</p>
                <p class="card-text">Catégorie : {{ $product->category_title }}</p>
                <p class="card-text">Détail : {{ $product->detail }}</p>
            </div>
            </div>
        </div>
    </div>

            <!-- Affichage des produits  -->

            <!-- <div class="card h-100 bg-green-50 w-100"> -->
                <!-- Image du produit -->
                <!-- <div class="row justify-content-center">
                    <img class="card-img-top product-image h-40 w-40" src="{{ asset('storage/images/' . $product->photo) }}" alt="Image du produit">
                </div> -->
                <!-- Détails du produit -->
                <!-- <div class="card-body">
                    <h5 class="card-title">{{ $product->title }}</h5>
                    <p class="card-text">Prix : {{ $product->price }} XOF</p>
                    <p class="card-text">Catégorie : {{ $product->category_title }}</p>
                    <p class="card-text">Détail : {{ $product->detail }}</p>
                </div>
            </div> -->

            
        


         <!-- Section "À Propos de Nous" -->
         <section class="bg-light py-5 my-4" id="apropos">
        <div class="container">
            <div class="row">
                <div class="col-md-6 mx-auto text-center">
                    <h2 class="mb-4">À Propos de Nous</h2>
                    <p>Biode est une boutique en ligne dédiée à fournir des produits bio de qualité supérieure à des prix compétitifs. Notre mission est de rendre le shopping de produits biologiques facile et agréable pour nos clients tout en promouvant un mode de vie sain et durable.</p>
                </div>
            </div>
        </div>
    </section>


                

    <footer class="bg-success text-white py-4">
        <div class="container text-center">
            <p class="mb-0">© 2024 Biode. Tous droits réservés.</p>
        </div>
    </footer>
     <!-- Script js de bootstrap -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

        
    </body>
</html>























 


