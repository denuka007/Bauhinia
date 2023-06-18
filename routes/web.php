<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function () {
  //  return view('welcome');
//});

//frontend customer
Route::get('/', [App\Http\Controllers\Frontend\FrontendController::class, 'index']);
Route::get('category', [App\Http\Controllers\Frontend\FrontendController::class, 'category']);
Route::get('category/{slug}', [App\Http\Controllers\Frontend\FrontendController::class, 'viewcategory']);
Route::get('category/{cate_slug}/{prod_name}', [App\Http\Controllers\Frontend\FrontendController::class, 'productview']);

//Route::get('cart', [App\Http\Controllers\Frontend\CartController::class, 'viewcart']);

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('add_to_cart', [App\Http\Controllers\Frontend\CartController::class, 'addProduct']);
Route::post('delete-cart-item', [App\Http\Controllers\Frontend\CartController::class, 'deleteproduct']);

//Route::get('cart', [App\Http\Controllers\Frontend\CartController::class, 'viewcart']);

Route::middleware(['auth'])->group(function () {

    Route::get('cart', [App\Http\Controllers\Frontend\CartController::class, 'viewcart']);
    Route::get('checkout', [App\Http\Controllers\Frontend\CheckoutController::class, 'index']);
    Route::post('place-order', [App\Http\Controllers\Frontend\CheckoutController::class, 'placeorder']);

    Route::get('my-orders', [App\Http\Controllers\Frontend\UserController::class, 'index']);
    Route::get('view-order/{id}', [App\Http\Controllers\Frontend\UserController::class, 'view']);

});

Route::middleware(['auth', 'isAdmin'])->group(function () {

   Route::get('/dashboard', [App\Http\Controllers\Adminn\FrontendController::class, 'index']);

   Route::get('categories', [App\Http\Controllers\Adminn\CategoryController::class, 'index']);
   //Route::get('categories','Adminn\CategoryController@index');

   Route::get('add-category', [App\Http\Controllers\Adminn\CategoryController::class, 'add']);
   Route::post('insert-category', [App\Http\Controllers\Adminn\CategoryController::class, 'insert']);
   Route::get('edit-category/{id}', [App\Http\Controllers\Adminn\CategoryController::class, 'edit']);
   Route::put('update-category/{id}', [App\Http\Controllers\Adminn\CategoryController::class, 'update']);
   Route::get('delete-category/{id}', [App\Http\Controllers\Adminn\CategoryController::class, 'destroy']);

   //Products route...
   Route::get('products', [App\Http\Controllers\Adminn\ProductController::class, 'index']);
   Route::get('add-products', [App\Http\Controllers\Adminn\ProductController::class, 'add']);
   Route::post('insert-products', [App\Http\Controllers\Adminn\ProductController::class, 'insert']);
   Route::get('edit_product/{id}', [App\Http\Controllers\Adminn\ProductController::class, 'edit']);
   Route::put('update-products/{id}', [App\Http\Controllers\Adminn\ProductController::class, 'update']);
   Route::get('delete_product/{id}', [App\Http\Controllers\Adminn\ProductController::class, 'destroy']);
   //delete_product

   Route::get('orders', [App\Http\Controllers\Adminn\OrderController::class, 'index']);
   Route::get('admin/view-order/{id}', [App\Http\Controllers\Adminn\OrderController::class, 'view']);
   Route::put('update-order/{id}', [App\Http\Controllers\Adminn\OrderController::class, 'updateorder']);
   Route::get('order-history', [App\Http\Controllers\Adminn\OrderController::class, 'orderhistory']);

   Route::get('users', [App\Http\Controllers\Adminn\DashboardController::class, 'users']);
   Route::get('view_user/{id}', [App\Http\Controllers\Adminn\DashboardController::class, 'viewuser']);



     });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
