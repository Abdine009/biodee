<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biode</title>


    <!-- Styles -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>
<body>

        <style>
            .carousel-item {
                height: 15rem;
                background: #777;
                position: relative;

            }

                .gradient-overlay {
                    position: absolute;
                    top: 0;
                    left: 0;
                    width: 100%;
                    height: 100%;
                    background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5));
                }

                .carousel-inner img {
                    width: 100%;
                    height: 100%;
                    object-fit: cover;
                }
                .no-border{
                    border : 0
                }

                
        </style>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Biode</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Accueil</a>
                </li>
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
            
                <li class="nav-item">
                <a class="nav-link" href="{{route('auth.loggin')}}">Se connecter</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="#">Créer un compte</a>
                </li>
                
            </ul>
            <form class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Rechercher un produit" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Rechercher</button>
            </form>
            </div>
        </div>
    </nav>


    <!-- Carousel-->
    <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active" data-bs-interval="10000">
            <img src="{{asset('storage/images/carrousel_1.jpg')}}" class="d-block w-100" alt="image1">
            </div>
            <div class="carousel-item" data-bs-interval="5000">
            <img src="{{ asset('storage/images/carrousel_2.jpg') }}" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item" data-bs-interval="5000">
            <img src="{{ asset('storage/images/carrousel_3.jpg') }}" class="d-block w-100" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <!-- Affichage des produits -->
    <!-- produits récents -->
    <div class="row ">
        <div class="col mx-5 my-4">
            <h3 class=""> 
                Les plus récents
            </h3>
        </div>
        <div class="col-1 mx-5 my-4">
            <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-arrow-right-short" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8"/>
            </svg>
        </div>
    </div>
    <div class="row row-cols-1 row-cols-md-3 mx-5 g-4">
        
        @foreach($products as $product)
            <div class="col">
                <div class="card h-100 h-md-50 no-border bg-light">
                <img src="{{ asset('storage/images/' . $product->photo) }}" class="card-img-top" alt="Image du produit">

                <div class="card-body">
                    <h5 class="card-title">{{ $product->title }}</h5>
                    <p class="card-text">{{ $product->price }} XOF</p>
                </div>
                </div>
            </div>
        @endforeach
    </div>



                <!-- beautyProducts -->

                <div class="row ">
        <div class="col mx-5 my-4">
            <h3 class=""> 
                Les produits de beauté bio
            </h3>
        </div>
        <div class="col-1 mx-5 my-4">
            <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-arrow-right-short" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8"/>
            </svg>
        </div>
    </div>
    <div class="row row-cols-1 row-cols-md-3 mx-5 g-4">
        
        @foreach($beautyProducts as $product)
            <div class="col">
                <div class="card h-100 h-md-50 no-border bg-light">
                <img src="{{ asset('storage/images/' . $product->photo) }}" class="card-img-top" alt="Image du produit">

                <div class="card-body">
                    <h5 class="card-title">{{ $product->title }}</h5>
                    <p class="card-text">{{ $product->price }} XOF</p>
                </div>
                </div>
            </div>
        @endforeach
    </div>



    <!-- Catégorie lait -->
    <div class="row ">
        <div class="col mx-5 my-4">
            <h3 class=""> 
                Lait
            </h3>
        </div>
        <div class="col-1 mx-5 my-4">
            <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-arrow-right-short" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8"/>
            </svg>
        </div>
    </div>
    <div class="row row-cols-1 row-cols-md-3 mx-5 g-4">
        
        @foreach($milkProducts as $product)
            <div class="col">
                <div class="card h-100 h-md-50 no-border bg-light">
                <img src="{{ asset('storage/images/' . $product->photo) }}" class="card-img-top" alt="Image du produit">

                <div class="card-body">
                    <h5 class="card-title">{{ $product->title }}</h5>
                    <p class="card-text">{{ $product->price }} XOF</p>
                </div>
                </div>
            </div>
        @endforeach
    </div>
        <!-- <div class="col">
            <div class="card h-100 h-md-50">
                <img src="..." class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">This is a short card.</p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card h-100">
                <img src="..." class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content.</p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card h-100">
                <img src="..." class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card h-100">
                <img src="..." class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card h-100">
                <img src="..." class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card h-100">
                <img src="..." class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                </div>  
            </div>
        </div>
        <div class="col">
            <div class="card h-100">
                <img src="..." class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                </div>
            </div>
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
