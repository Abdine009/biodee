<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href=" {{asset('storage/images/favicon.png')}}">

    <title>Biode</title>
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

    <div class="row justify-content-center mt-5">
    <div class="col-md-6">
        <div class="card shadow">
            <div class="card-body">
                <form method="POST" action="{{ route('product.store') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label for="title" class="form-label">Titre :</label>
                        <input type="text" class="form-control" id="title" name="title" required autofocus value="{{ old('title') }}">
                        @error('title')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="price" class="form-label">Prix :</label>
                        <input type="text" class="form-control" id="price" name="price" required autofocus value="{{ old('price') }}">
                        @error('price')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="category_title" class="form-label">Catégorie :</label>
                        <select name="category_title" class="form-select" required>
                            <option value="">Sélectionner une catégorie</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->title }}">{{ $category->title }}</option>
                            @endforeach
                        </select>
                        @error('category_title')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="photo" class="form-label">Photo :</label>
                        <input type="file" class="form-control" id="photo" name="photo">
                        @error('photo')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="detail" class="form-label">Détail :</label>
                        <input type="text" class="form-control" id="detail" name="detail" required autofocus value="{{ old('detail') }}">
                        @error('detail')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Ajouter le produit</button>
                    </div>
                </form>
            </div>
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