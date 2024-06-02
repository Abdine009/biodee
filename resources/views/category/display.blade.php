<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biodee</title>
</head>
<body>
<div class="container">
    <div class="row">
    



    @foreach($categories as $category)
        <div class="col-md-4">

           
            <div class="card mb-4 shadow-sm">
                <div class="card-body">
                    <p class="card-text">{{ $category->title }}</p>
                </div>
            </div>
        </div>
        @endforeach
    

        
</div>

</body>
</html>