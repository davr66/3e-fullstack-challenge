<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Models\Product;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::get('/dashboard', function () {
    $products = Product::all();
    return view('dashboard',['products'=>$products]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

#ROTAS DAS PÁGS DE PRODUTOS
Route::prefix('product')->group(function(){
    Route::get('/cadastro',[ProductController::class,'cadastro'])->middleware(['auth', 'verified'])->name('products-cad');
    Route::post('/cadastro',[ProductController::class,'store'])->middleware(['auth', 'verified'])->name('products-cad.add');
    Route::post('/deletar',[ProductController::class,'deleteMultiple'])->middleware(['auth', 'verified'])->name('products-deleteM');
    Route::get('/{id}/mudar',[ProductController::class,'mudarStatus'])->middleware(['auth', 'verified'])->name('products-onOff');
    Route::get('/{id}/edit',[ProductController::class,'edit'])->middleware(['auth', 'verified'])->name('products-edit');
    Route::put('/{id}',[ProductController::class,'update'])->name('products-update');
});
