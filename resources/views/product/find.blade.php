<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>find</title>
</head>
<body>


    @if(count($products) > 0)
    @foreach($products as $product)
        <div>
            <h2>{{ $product->title }}</h2>
        </div>


        <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>edit</title>
</head>
<body>
    


<div>

Modifier


<form action="" method="post" enctype="multipart/form-data"> 
    @csrf
    
    <div>
    <label for="title">Titre :</label><br>

    "{{$product->title}}"
    </div>
    <div>
    <label for="price">Prix :</label><br>

    "{{$product->price}}"
    </div>
    <div>
    <label for="category">Catégorie :</label><br>

    "{{$product->category_title}}"

   
    </div>
    <div>
    <label for="detail">détail :</label><br>

    "{{$product->detail}}"

  
    </div>

    <img class="card-img-top" src="{{asset('storage/images/' . $product->photo)}}" alt=" Il s'agit de {{ $product->title  }}">

  









    @endforeach
    @else
        <p>Aucun produit trouvé.</p>
    @endif

</body>
</html> -->

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

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

                            
                          

                            

                            <!-- Navigation Links -->
                            <div class="hidden space-x-5 sm:-my-px sm:ms-10 sm:flex">
                                <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                                        {{ __('Accueil') }}
                                </x-nav-link>

                                @if (Route::has('login'))
                                    <nav class=" flex  justify-end">
                                        @auth
                                            <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                                                {{ __('Accueil') }}
                                            </x-nav-link>
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
                
                
<!--             seconde      -->





<nav x-data="{ open: false }" class="bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700">
                <!-- Primary Navigation Menu -->
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="flex justify-between h-16">
                        <div class="flex">

                        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight mt-4">
                            {{ __('Détail') }}
                        </h2> <br>  
                        </div>

                    </div>
                </div> 
                
            </nav>

            <!-- Affichage des produits  -->

        <div class="container mb-4 mt-10">
            <div class="card h-100 bg-green-50 w-100">
                <!-- Image du produit -->
                <div class="row justify-content-center">
                    <img class="card-img-top product-image h-40 w-40" src="{{ asset('storage/images/' . $product->photo) }}" alt="Image du produit">
                </div>
                <!-- Détails du produit -->
                <div class="card-body">
                    <h5 class="card-title">{{ $product->title }}</h5>
                    <p class="card-text">Prix : {{ $product->price }}</p>
                    <p class="card-text">Catégorie : {{ $product->category_title }}</p>
                    <p class="card-text">Détail : {{ $product->detail }}</p>
                </div>
            </div>

            <div class="d-flex justify-content-start align-items-center mt-4">
                <a href="{{ route('edit.product', ['product'=> $product,]) }}">
                    
                    <div class="flex items-center gap-4">
                            <x-primary-button>{{ __('Modifier') }}</x-primary-button>
                
                    </div>
                </a>
                
                
                <form action="{{ route('delete.product', [$product -> uuid]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <div class="flex items-center gap-4 ml-2">
                        <x-danger-button>{{ __('Supprimer') }}</x-danger-button>
                
                    </div>
                </form>
            </div>
            
        </div>
    <div>



    

</div>
            

            

                    
        </div>
        <footer class="py-5 text-center text-sm text-white dark:text-white/70 bg-green-500">
                        Biode &copy; <?php echo date("Y"); ?>
                    </footer>
        
    </body>
</html>







 


