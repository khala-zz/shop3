<?php

use Illuminate\Support\Facades\Route;
//frontend
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PermissionsController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ContactController;

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


//frontend
Route::get('/',[HomeController::class,'home']) -> name('home');

//san pham
Route::get('/danh-muc-san-pham/{slug}/{id}',[CategoryController::class,'index']) -> name('category.product');
Route::get('/cua-hang',[CategoryController::class,'shop']) -> name('shop');
Route::get('/product/{slug}/{id}',[ProductController::class,'detail']) -> name('product.detail');

//news
Route::get('/danh-muc-tin-tuc/{slug}/{id}',[NewsController::class,'listCat']) -> name('cat_news.news');
Route::get('/tin-tuc',[NewsController::class,'listNews']) -> name('list.news');
Route::get('/tin-tuc/{slug}/{id}',[NewsController::class,'detail']) -> name('new.detail');


//tag
Route::get('/tags/{slug}/{id}',[NewsController::class,'listNewsTag']) -> name('list.news.tags');



//search product
Route::post('/search',[HomeController::class,'searchProducts']) -> name('search.product');
// lien he
Route::get('/lien-he', [ContactController::class, 'createForm']);

Route::post('/lien-he', [ContactController::class, 'ContactUsForm'])->name('contact.store');

//newsletter
Route::post('/newsletter', [ContactController::class, 'storeNewsletter'])->name('newsletter.store');




//add to cart
Route::match(['get','post'],'/add-cart',[ProductController::class,'addToCart']);

//view cart
Route::match(['get','post'],'/cart',[ProductController::class,'viewCart']);

//delete cart
Route::get('/cart/delete-product/{id}',[ProductController::class,'deleteCartProduct']);

//update cart
Route::get('/cart/update-quantity/{id}/{quantity}',[ProductController::class,'updateCartQuantity']);

//apply coupon
Route::post('/cart/apply-coupon',[ProductController::class,'applyCoupon']);

//change price product route
Route::get('/change-price/{value}',[ProductController::class,'changePrice']) -> name('change-price');

//reset price product route
Route::get('/change-price-reset/{value}',[ProductController::class,'resetPrice']) -> name('change-price-reset');

// su dung middleware front login
Route::middleware(['frontlogin']) -> group(function(){
    //review
    Route::post('/review/{id}', [ReviewController::class, 'saveReview']) -> name('post.review.product');
       
});      
//route for admin
require 'admin.php';

require __DIR__.'/auth.php';
