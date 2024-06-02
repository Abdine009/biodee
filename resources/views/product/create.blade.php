<!-- <div>

créer

<form action="{{ route('product.docreate') }}" method="post" enctype="multipart/form-data"> 
    @csrf
    <div>
    <label for="title">Titre :</label><br>

        <input type="text" name="title" ></input>

        @error("title")
            {{$message}}
            @enderror

    </div>
    <div>
    <label for="price">Prix :</label><br>

        <input type="text" name="price" ></input>

        @error("title")
            {{$message}}
            @enderror

    </div>
    <div>
            <label for="category">Catégorie :</label><br>
            <select name="category_title">
                <option value="">Sélectionner une catégorie</option>
                @foreach($categories as $category)
                    <option value="{{ $category->title }}">{{ $category->title }}</option>
                @endforeach
            </select>
            @error("category_title")
                {{$message}}
            @enderror
        </div>

    <div>
    <label for="detail">détail :</label><br>

        <input type="text" name="detail" ></input>

        @error("title")
            {{$message}}
            @enderror

    </div>
    <div>
    <label for="photo">photo :</label><br>
    <input type="file" name="photo" ></input>
    @error("photo")
        {{$message}}
        @enderror
    </div>
 <button type="submit"> Créer </button>
</form>
</div> -->


<x-guest-layout>
    <form method="POST" action="{{ route('product.docreate') }}" enctype="multipart/form-data">
        @csrf
        

        <div>
            <x-input-label for="title"  />Titre : <br>
            <x-text-input type="text" class="block mt-1 w-full" name="title" required autofocus value="{{ old ('title')}}"/>
            <x-input-error :messages="$errors->get('title')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="price"  />Prix : <br>
            <x-text-input type="text" class="block mt-1 w-full" name="price" required autofocus value="{{ old ('price')}}"/>
            <x-input-error :messages="$errors->get('price')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="category_title"  />Categorie : <br>
            <!-- <x-text-input type="text" class="block mt-1 w-full" name="categorie_title" required autofocus value="{{ old ('category_title')}}"/> -->
            <select name="category_title" class="block mt-1 w-full border border-gray-300 rounded-md">
                <option value="" >Sélectionner une catégorie</option>
                @foreach($categories as $category)
                    <option value="{{ $category->title }}">{{ $category->title }}</option>
                @endforeach
            </select>
            <x-input-error :messages="$errors->get('categorie_title')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="photo"  />Photo : <br>
            <input type="file" class="block mt-1 w-full" name="photo" ></input>
            <x-input-error :messages="$errors->get('photo')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="detail" />détail : <br>
            <x-text-input type="text" name="detail" required autofocus value="{{ old ('detail')}}" class="block mt-1 w-full" />
            <x-input-error :messages="$errors->get('detail')" class="mt-2" />
        </div>

        

        <div class="flex items-center justify-start mt-4">
            <x-primary-button class="ms-3">
                {{ __('Ajouter le produit') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
