<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use  App\Models\Product;
use  App\Models\Category;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ProductRequestUpdate;



class ProductController extends Controller
{
    //


    // public function index()
    // {
    //     //
    //     return view("product.create",['categories' => $categories]);

    // }




    public function create(){
        $categories = Category::all();
        return view("product.create",['categories' => $categories]);
    }

    public function store(ProductRequest $request){

        $imagePath = $request->file('photo')->store('','custom_images');
        $validatedData = $request->validated();
        $validatedData['photo']=$imagePath;

        $userId = Auth::id();
        $validatedData['user_uuid']=$userId;


        $product=Product:: create ($validatedData);
        return Redirect::route('dashboard')->with('success', 'Produit créé avec succès !');

        
    }


    public function findByCategoryRecent(){
        $data = $this->getCommonData();
        return view('bienvenue', $data);
    }
    
    public function findByCategoryOnDashboard(){
        $data = $this->getCommonData();
        return view('dashboard', $data);
    }
    
    private function getCommonData(){
        $milkProducts = $this->findByCategoryMilk();
        $beautyProducts = $this->findByCategoryBeauty();
    
        $products = Product::orderBy('created_at', 'desc')
                                ->get();
        $categories = Category::orderBy('created_at', 'desc')
                                ->take(5)
                                ->get();
    
        return [
            'products' => $products,
            'categories' => $categories,
            'milkProducts' => $milkProducts,
            'beautyProducts' => $beautyProducts,
        ];
    }



    public function findByCategoryMilk(){



        $milkProducts = Product::where('category_title', 'like' , "Et voluptas voluptate sed ducimus eius rem sed inventore.")
                            ->orderBy('created_at', 'desc')
                            ->take(3)
                            ->get();
        $categories = Category::all();
        return $milkProducts;

    }

    public function findByCategoryBeauty(){



        $beautyProducts = Product::where('category_title', 'like' , "Et voluptas voluptate sed ducimus eius rem sed inventore.")
                            ->orderBy('created_at', 'desc')
                            ->take(3)
                            ->get();
        $categories = Category::all();
        return $beautyProducts;

    }

    public function findByCategory(Request $request){

       
        //dd($request);
        $categoryId = $request->get('uuid');
        //dd($categoryId);
        $category = Category::find($categoryId);
        //dd($category);

        $category_title= $category ->title;
        //dd($category_title);

        //$products = $category ? $category->products : [];


        $products = Product::where('category_title', 'like' , "$category_title")->get();

        //$products = Product::where('title', 'like', "$title")->get();

        //dd($products);

        $categories = Category::all();

        return view('welcome',['products' => $products,'categories' => $categories]);
    }
    

    public function display(){
        $products = Product::all();
        $categories = Category::all();

        return view('bienvenue', ['products' => $products,'categories' => $categories]);
        }

    public function displayOnDashboard(){
            $products = Product::all();
            $categories = Category::all();
    
            return view('dashboard',['products' => $products,'categories' => $categories]);
            }

    


    public function edit ($uuid){

        $product= Product::find($uuid);
        //dd($category);
        if (!$product) {
            abort(404); // produit non trouvé
        }

       
        return view('product.edit', ['product'=>$product]);
    }

    public function update(string $uuid, ProductRequestUpdate $request){

        $product = Product::find($uuid);
    
        if(!$product) {
            // Gérer le cas où le produit n'est pas trouvé
            return redirect()->back()->with('error', 'Produit non trouvé');
        }
    
        // Vérifier si la requête est valide
        $validatedData = $request->validated();
    
        // Traiter la mise à jour du produit
        if(!$request->hasFile('photo') || !$request->file('photo')->isValid()) {
            // Si aucun fichier photo n'est fourni ou s'il n'est pas valide,
            // ne pas mettre à jour la photo
            unset($validatedData['photo']);
        } else {
            // Si un fichier photo est fourni et est valide,
            // mettre à jour la photo
            $imagePath = $request->file('photo')->store('custom_images');
            $validatedData['photo'] = $imagePath;
        }
    
        // Mettre à jour les autres champs du produit
        $product->update($validatedData);
    
        // Rediriger avec un message de succès
        return redirect()->route('displayProducts.user')->with('success', 'Produit mis à jour avec succès');
    }

    public function DisplayProductsByUuid(){
        
        return view ('product.displayMy');
    }
    


    public function destroy ($uuid){

        $product= Product::find($uuid);
        //dd($category);
        if (!$product) {
            abort(404); // Catégorie non trouvée
        }

        $product->delete();
       
    }
    public function find (Request $request){

        $title= $request->input('title');

        $products = Product::where('title', 'like', "%$title%")->get();
       
        return view('product.find', ['products'=>$products]);
    }


    public function trouver(Request $request){

        $title = $request->input('title');
        dd($title);
        $products = Product::where('title', 'like', "$title")->get();

        
         return view('product.find', ['products'=> $products,
             ]);
    }

    public function details(Product $product){
       // $uuid = $request->input('product');
       //$uuid = $request->route('product'); // Récupère l'UUID du produit depuis l'URL
       //dd($product);

        // dd($request);
        //$uuid = $request->route('uuid');
        //dd($uuid);

        //$product = Product::find($uuid);
        // if (!$product) {
        //     abort(404);
        // }

        return view('product.detail', ['product'=> $product]);
        //return view('product.detail');
    }


    public function productsByUuid(Request $request){

        $userId = Auth::id();
        // dd($userId);
        $products = Product::where('user_uuid', 'like', "$userId")->get();
        
         return view('product.displayMy', [
             'products'=> $products,
             ]);

    }
    

}
