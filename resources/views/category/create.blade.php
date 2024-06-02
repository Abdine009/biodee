<div>

créer

<form action="" method="post"> 
    @csrf
    <input type="text" name="title" ></input>

    @error("title")
        {{$message}}
        @enderror


 <button type="submit"> Créer </button>
</form>
</div>
