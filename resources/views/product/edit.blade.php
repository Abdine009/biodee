
<!-- <!DOCTYPE html>
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
    @method('put')
    
    <div>
    <label for="title">Titre :</label><br>

    <input type="text" name="title" value="{{ old ('title',$product->title)}}"></input>

    @error("title")
        {{$message}}
        @enderror
    </div>
    <div>
    <label for="price">Prix :</label><br>

    <input type="text" name="price" value="{{ old ('price',$product->price)}}"></input>

    @error("price")
        {{$message}}
        @enderror
    </div>
    <div>
    <label for="category">Catégorie :</label><br>

    <input type="text" name="category_title" value="{{ old ('category_title',$product->category_title)}}"></input>

    @error("category_title")
        {{$message}}
        @enderror
    </div>
    <div>
    <label for="detail">détail :</label><br>

    <input type="text" name="detail" value="{{ old ('detail',$product->detail)}}"></input>

    @error("detail")
        {{$message}}
        @enderror
    </div>
    <div>
    <img class="card-img-top" src="{{asset('storage/images/' . $product->photo)}}" alt=" Il s'agit de {{ $product->title  }}">

    <label for="photo">photo :</label><br>
    <input type="file" name="photo" ></input>
    @error("photo")
        {{$message}}
        @enderror
    </div>

  

   
 <button type="submit"> Modifier </button>
</form>

<form action="{{ route('delete.product', [$product -> uuid]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Supprimer</button>

                    </form>


                    <form action="{{ route('find.product', ['products'=>$prorduct]) }" method="post">
                        @csrf
                        <input type="text" name="title" placeholder="Entrez le nom du produit à rechercher">
                        <button type="submit"> Rechercher </button>

                    </form>

</body>
</html>
 -->



 
 <x-guest-layout>
    
    <img class="card-img-top" src="{{asset('storage/images/' . $product->photo)}}" alt=" Il s'agit de {{ $product->title  }}">

    <form method="POST" action="" enctype="multipart/form-data">
        @csrf
        @method('put')

        <div>
            <x-input-label for="title"  />Titre : <br>
            <x-text-input type="text" class="block mt-1 w-full" name="title" required autofocus value="{{ old ('title',$product->title)}}"/>
            <x-input-error :messages="$errors->get('title')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="price"  />Prix : <br>
            <x-text-input type="text" class="block mt-1 w-full" name="price" required autofocus value="{{ old ('price',$product->price)}}"/>
            <x-input-error :messages="$errors->get('price')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="category_title"  />Categorie : <br>
            <x-text-input type="text" class="block mt-1 w-full" name="categorie_title" required autofocus value="{{ old ('category_title',$product->category_title)}}"/>
            <x-input-error :messages="$errors->get('categorie_title')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="photo"  />Photo : <br>
            <input type="file" class="block mt-1 w-full" name="photo" ></input>
            <x-input-error :messages="$errors->get('photo')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="detail" />détail : <br>
            <x-text-input type="text" name="detail" required autofocus value="{{ old ('detail',$product->detail)}}" class="block mt-1 w-full" />
            <x-input-error :messages="$errors->get('detail')" class="mt-2" />
        </div>

        

        <div class="flex items-center justify-start mt-4">
            <x-primary-button class="ms-3">
                {{ __('Modifier') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>

