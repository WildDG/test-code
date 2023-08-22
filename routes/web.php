<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProductController;

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

// Route::get('/', function () {
//     return redirect('/products');
// });
Route::controller(ProductController::class)->group(function(){
    Route::get('', 'index')->name('products.index');
    Route::get('/create', 'create')->name('products.create');
    Route::post('/store', 'store')->name('products.store');
    Route::get('/edit/{slug}', 'edit')->name('products.edit');
    Route::put('/update', 'update')->name('products.update');
    Route::get('/detail/{slug}', 'show')->name('products.show');
    Route::delete('/delete/{slug}', 'destroy')->name('products.destroy');
});
// Route::resource('products', ProductController::class);