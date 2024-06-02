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


<form action="{{ route('update.category', $category->uuid) }}" method="post" enctype="multipart/form-data"> 
    @csrf
    @method('put')
    
    <div>
    <input type="text" name="title" value="{{ old ('title',$category->title)}}"></input>

    @error("title")
        {{$message}}
        @enderror
    </div>

  

   
 <button type="submit"> Modifier </button>
</form>


<form action="{{ route('delete.category', [$category -> uuid]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Supprimer</button>

                    </form>

                    <form action="{{ route('find.category', ['category'=>$category]) }}" method="post">
                        @csrf
                        <input type="text" name="title" placeholder="Entrez le nom de la categorie à rechercher">
                        <button type="submit"> Rechercher </button>

                    </form>

</div>


</body>
</html>

