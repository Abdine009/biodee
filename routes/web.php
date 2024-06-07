<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AuthController;



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

Route::get('/dashboard', [ProductController::class, 'findByCategoryOnDashboard'])->middleware(['auth', 'verified'])->name('dashboard');




Route::get('/loggin',[AuthController::class, 'login'])->name('auth.login');
Route::delete('/logout',[AuthController::class, 'logout'])->name('auth.logout');
Route::post('/loggin',[AuthController::class, 'doLogin']);

Route::get('/create/user', [AuthController::class,'create'])->name('user.create');
Route::post('/create/user', [AuthController::class,'docreate'])->name('user.docreate');

Route::get('/',[ProductController::class,'findByCategoryRecent'])->name('display.products');

Route::get('/details/product/{product}',[ProductController::class,'details'])->name('detail.product');


Route::middleware('auth')->group(function () {

    Route::get('/create/products', [ProductController::class,'create'])->name('product.create');
    Route::post('/create/products', [ProductController::class,'docreate'])->name('product.docreate');
    Route::get('/{product}/edit',[ProductController::class,'edit'])->name('edit.product');
    Route::put('/{product}/edit',[ProductController::class,'doedit'])->name('update.product');
    Route::delete('/{product}/delete',[ProductController::class,'delete'])->name('delete.product');
    Route::post('/find', [ProductController::class,'find'])->name('product.find');
    Route::post('/trouver',[ProductController::class, 'trouver'])->name('trouver');
    Route::post('/find/category', [ProductController::class, 'findByCategory'])->name('find.category');
    Route::get('/navigation', [ProductController::class, 'displayOnNavigation'])->name('navigation');
    Route::post('/products/user',[ProductController::class, 'productsByUuid'])->name('products.user');

    Route::get('/create/category', [CategoryController::class,'create'])->name('category.create');
    Route::post('/create/category', [CategoryController::class,'docreate']);
    Route::get('/categories',[CategoryController::class,'display'])->name('dispaly.categories');
    Route::get('/{categorie}/edit',[CategoryController::class,'edit'])->name('edit.category');
    Route::put('/{categorie}/edit',[CategoryController::class,'doedit'])->name('update.category');
    Route::delete('/{categorie}/delete',[CategoryController::class,'delete'])->name('delete.category');
    Route::post('/find',[CategoryController::class,'find'])->name('find.category');

});

require __DIR__.'/auth.php';
