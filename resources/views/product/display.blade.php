<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href=" {{asset('storage/images/favicon.png')}}">

    <title>Biode</title>
</head>
<body>
<div class="container">
    <div class="row">
    



    @foreach($products as $product)
        <div class="col-md-4">

           
            <div class="card mb-4 shadow-sm">
                <div class="card-body">
                    <p class="card-text">{{ $product->title }}</p>
                </div>
            </div>
            <div class="card mb-4 shadow-sm">
                <div class="card-body">
                    <p class="card-text">{{ $product->category_title }}</p>
                </div>
            </div>
            <div class="card mb-4 shadow-sm">
                <div class="card-body">
                    <p class="card-text">{{ $product->price }}</p>
                </div>
            </div>
            <div class="card mb-4 shadow-sm">
                <div class="card-body">
                    <p class="card-text">{{ $product->detail }}</p>
                </div>
            </div>
            <div class="card mb-4 shadow-sm">
            <img class="card-img-top" src="{{asset('storage/images/' . $product->photo)}}" alt=" Il s'agit de {{ $product->title  }}">
            </div>
        </div>
        @endforeach
    

        
</div>

</body>
</html>