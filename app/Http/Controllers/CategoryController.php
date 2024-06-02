<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\category;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
    //

    public function display(){
        $categories = Category::all();
        return view('category.display',['categories' => $categories]);
    }

    public function create(){
        return view("category.create");
    }
    public function docreate(CategoryRequest $request){
        Category:: create ($request -> validated());
    }

    public function edit ($uuid){
        dd($uuid);

        $category= Category::find($uuid);
        dd($category);
        if (!$category) {
            abort(404); // Catégorie non trouvée
        }
        return view('category.edit', ['category'=>$category]);
    }

    public function doedit(string $uuid, CategoryRequest $request){

        $category= Category::find($uuid);

        //dd($category);

        $validatedData = $request->validated();

        $category->update($validatedData);

    }

    public function delete ($uuid){

        $category= Category::find($uuid);
        //dd($category);
        if (!$category) {
            abort(404); // Catégorie non trouvée
        }

        $category->delete();
       
    }

    public function find (Request $request){

        $title= $request->input('title');

        $categories = Category::where('title', 'like', "%$title%")->get();
       
        //dd($category);
        

       
        return view('category.find', ['categories'=>$categories]);
    }
}

