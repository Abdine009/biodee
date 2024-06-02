<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>find</title>
</head>
<body>


    @if(count($categories) > 0)
    @foreach($categories as $categorie)
        <div>
            <h2>{{ $categorie->title }}</h2>
        </div>
    @endforeach
    @else
        <p>Aucune categorie trouvée.</p>
    @endif

</body>
</html>