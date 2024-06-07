<!DOCTYPE html>
<html lang="en">
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href=" {{asset('storage/images/favicon.png')}}">

    <title>Biode</title>

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
                <li class="nav-item my-2">
                <form action="{{ route('find.category') }}" method="POST">
                                @csrf
                                <select name="uuid" class="border-1 rounded border" onchange="this.form.submit()">
                                    <option value="" selected disabled>Sélectionner une catégorie</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->uuid }}">{{ $category->title }}</option>
                                    @endforeach
                                </select>
                            </form>
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
            <form class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Rechercher un produit" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Rechercher</button>
            </form>
            </div>
        </div>
    </nav>

        





            <!-- Affichage des produits  -->


            <div class="mx-5 mt-5">

            <div class="row">

                @foreach($products as $product)
                    <div class="col-md-4 mb-4">
                        <div class="card h-100 no-border bg-light">
                            <div class="overflow-hidden">
                                <a href="{{route('detail.product', ['product' => $product])}}">
                                    <img src="{{ asset('storage/images/' . $product->photo) }}" class="card-img-top" alt="Image du produit">
                                </a>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">{{ $product->title }}</h5>
                                <p class="card-text">{{ $product->price }} XOF</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
    </div>


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














