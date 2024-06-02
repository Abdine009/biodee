<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

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
        </style>



    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-50 dark:bg-gray-400">

            <nav x-data="{ open: false }" class="bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700">
                <!-- Primary Navigation Menu -->
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="flex justify-between h-16">
                        <div class="flex">


                            <!-- Logo -->
                            <div class="shrink-0 flex items-center">
                                <a href="{{ route('dashboard') }}">
                                <img src="{{ asset('storage/images/biode.png') }}" alt="Your Logo" style="width: 100px; height:100px">
                                </a>
                            </div>

                            <div class="shrink-0 flex items-center ms-2">

                                <form action="{{ route('trouver', ['products'=>$products])}}" method="post" >
                                    @csrf
                                    <input type="text" name="title" placeholder="Entrez le nom du produit à rechercher" class="border-1 rounded border">
                                    <button type="submit"> Rechercher </button>

                                </form>
                            </div>
                            <!-- Affichage des produits par produit -->
                            <div class="shrink-0 flex items-center ms-4" >




                                <!--  -->
                            <form action="{{ route('find.category') }}" method="POST">
                                @csrf
                                <select name="uuid" class="border-1 rounded border" onchange="this.form.submit()">
                                    <option value="" selected disabled>Sélectionner une catégorie</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->uuid }}">{{ $category->title }}</option>
                                    @endforeach
                                </select>
                            </form>




                            <!--  -->
                            </div>





                            <!-- Navigation Links -->
                            <div class="hidden space-x-5 sm:-my-px sm:ms-10 sm:flex">
                                <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                                        {{ __('Tableau de bord') }}
                                </x-nav-link>

                                @if (Route::has('login'))
                                    <nav class=" flex  justify-end">
                                        @auth
                                            <!-- <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                                                {{ __('Accueil') }}
                                            </x-nav-link> -->
                                        @else
                                            <x-nav-link :href="route('login')" :active="request()->routeIs('login')">
                                                {{ __('Login') }}
                                            </x-nav-link>

                                            @if (Route::has('register'))
                                                <x-nav-link :href="route('register')" :active="request()->routeIs('register')">
                                                {{ __('Register') }}
                                                </x-nav-link>
                                            @endif
                                        @endauth


                                    </nav>
                                @endif
                            </div>



                        </div>


                    </div>
                </div>

            </nav>









            <nav x-data="{ open: false }" class="bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700">
                <!-- Primary Navigation Menu -->
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="flex justify-between h-16">
                        <div class="flex">

                        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight mt-4">
                            {{ __('Accueil') }}
                        </h2> <br>



                            <!-- Affichage des produits par produit -->
                            <div class="shrink-0 flex items-center ms-4" >






                            </div>



                        </div>


                    </div>
                </div>

            </nav>



            <!-- Affichage des produits  -->

<div class="container mb-4 mt-20">
    <div class="row row-cols-1  row-cols-xl-5 g-4 mb-4">
        @foreach($products as $product)
        <div class="col">
            <div class="card h-100 bg-green-20">
                <div class="row justify-content-center">
                <a href="{{route('detail.product', ['product' => $product])}}" class="row justify-content-center">
                    <img class="card-img-top product-image row justify-content-center" src="{{ asset('storage/images/' . $product->photo) }}" alt="Image du produit">

                </a>

                    <h5 class="card-title row justify-content-center">{{ $product->title }}</h5>
                    <p class="card-text row justify-content-center">{{ $product->price }} XOF</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>




        </div>





        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Biode</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                    </li>
                    <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Dropdown
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                    </li>
                </ul>
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
                </div>
            </div>
        </nav>
        <footer class="py-5 text-center text-sm text-white dark:text-white/70 bg-green-500">
            Biode &copy; <?php echo date("Y"); ?>
        </footer>

    </body>
</html>

















