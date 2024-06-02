<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">


<h1>
    Se connecter
</h1>


    <form action="" method="post">
        @csrf

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" class="form-control" id="email" placeholder="Entrez votre email" value="{{old('email')}}">
                @error("email")
                {{$message}}
                @enderror
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Mot de passe</label>
                <input type="password" name = "password" class="form-control" id="password" placeholder="Entrez votre mot de passe" >
                @error("password")
                {{$message}}
                @enderror
            </div>
            <button type="submit" class="btn btn-primary w-100">Se connecter</button>
    </form>
                