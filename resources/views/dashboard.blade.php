<x-app-layout>
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

    <x-slot name="header">
        <div class="flex items-center justify-between space-x-4">

        
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight shrink-0 flex items-center ms-2">
            {{ __('Tableau de bord') }}
        </h2> <br>

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

        <a href="{{ route('product.create') }}">

            <div class="flex items-center gap-4 justify-content-end shrink-0 flex items-center ms-2">
                <x-primary-button>{{ __('Ajouter un produit') }}</x-primary-button>
            </div>
        </a>
        
        </div>
    </x-slot>

    <!-- <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-green-300 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("Vous êtes connecté!") }}
                </div>
            </div>
        </div>
    </div> -->
                <!-- Affichage des produits  -->
            
<div class="container mb-4 py-12">
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-5 g-4 mb-4">
        @foreach($products as $product)
        <div class="col">
            <div class="card h-100 bg-green-10">
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



</x-app-layout>















 


