<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;


// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::get('/',[ProductController::class,'display'])->name('display.products');
Route::get('/create/products', [ProductController::class,'create'])->name('product.create');
Route::post('/create/products', [ProductController::class,'docreate'])->name('product.docreate');
Route::get('/{product}/edit',[ProductController::class,'edit'])->name('edit.product');
Route::put('/{product}/edit',[ProductController::class,'doedit'])->name('update.product');
Route::delete('/{product}/delete',[ProductController::class,'delete'])->name('delete.product');
Route::post('/find', [ProductController::class,'find'])->name('product.find');
Route::post('/trouver',[ProductController::class, 'trouver'])->name('trouver');
Route::get('/details/product/{product}',[ProductController::class,'details'])->name('detail.product');
Route::post('/find/category', [ProductController::class, 'findCategory'])->name('find.category');
Route::get('/dashboard', [ProductController::class, 'displayOnDashboard'])->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/navigation', [ProductController::class, 'displayOnNavigation'])->name('navigation');



Route::get('/create/category', [CategoryController::class,'create'])->name('category.create');
Route::post('/create/category', [CategoryController::class,'docreate']);
Route::get('/categories',[CategoryController::class,'display'])->name('dispaly.categories');
Route::get('/{categorie}/edit',[CategoryController::class,'edit'])->name('edit.category');
Route::put('/{categorie}/edit',[CategoryController::class,'doedit'])->name('update.category');
Route::delete('/{categorie}/delete',[CategoryController::class,'delete'])->name('delete.category');
Route::post('/find',[CategoryController::class,'find'])->name('find.category');

require __DIR__.'/auth.php';
