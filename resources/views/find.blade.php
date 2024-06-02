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