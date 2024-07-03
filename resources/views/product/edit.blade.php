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
                <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{route('dashboard')}}">Accueil</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="#apropos">A propos de nous</a>
                </li>
               
                
            </ul>
            
            </div>
        </div>
    </nav> 
    
    <div class="container mt-5">
    <div class="row">
        
        <form action="{{route('products.user')}}" method="POST">
            @csrf
        <button type="submit" class="mb-3 btn btn-secondary">
        Retour sur mes produits
        </button>
        </form>
        
        <div class="col-md-6">
            <img class="card-img-top" src="{{asset('storage/images/' . $product->photo)}}" alt=" Il s'agit de {{ $product->title }}">
        </div>
        <div class="col-md-6">
            <form method="POST" action="{{ route('product.update', $product) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="title">Titre :</label>
                    <input type="text" class="form-control" name="title" required autofocus value="{{ old ('title',$product->title)}}">
                    @error('title')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="price">Prix :</label>
                    <input type="text" class="form-control" name="price" required autofocus value="{{ old ('price',$product->price)}}">
                    @error('price')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="category_title">Catégorie :</label>
                    <input type="text" class="form-control" name="category_title" required autofocus value="{{ old ('category_title',$product->category_title)}}">
                    @error('category_title')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="photo">Photo :</label>
                    <input type="file" class="form-control" name="photo">
                    @error('photo')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="detail">Détail :</label>
                    <input type="text" class="form-control" name="detail" required autofocus value="{{ old ('detail',$product->detail)}}">
                    @error('detail')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group mt-2">
                    <button type="submit" class="btn btn-primary">Modifier</button>
                </div>
            </form>
        </div>
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