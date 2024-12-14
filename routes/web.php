<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ContaceController;
use App\Http\Controllers\CoronaController;
use App\Http\Controllers\GoogleAuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Order;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\StripeController;
use App\Http\Controllers\WishlistController;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

// Route::get('/ta', function () {
//     return view('home.userpage');
// });
Route::get('logout', [AuthController::class, 'logout'])->name('logout');
Route::post('logout', [AuthController::class, 'logout'])->name('logout.post');

Route::middleware(['auth:sanctum','verified'])->get('/dashboard',function(){
    return view('dashboard');
})->name('dashboard');

// Auth::routes();
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/red', [HomeController::class, 'redirect'])->middleware('auth','verified');
Route::get('/rem_product', [HomeController::class, 'rem_product']);
Route::get('/view_catagory', [AdminController::class, 'view_catagory']);
Route::post('/add_category', [AdminController::class, 'add_category']);
Route::get('/delete_category/{id}', [AdminController::class, 'delete_category']);
Route::get('/edit_category/{id}', [AdminController::class, 'edit_category']);
Route::post('update_post/{id}',[AdminController::class,'update_post']);


Route::get('/view_products', [AdminController::class, 'view_products']);
Route::get('/show_product', [AdminController::class, 'show_product']);
Route::get('/show_coupon', [WishlistController::class, 'show_coupon']);
Route::post('/add_product', [AdminController::class, 'add_product']);
Route::get('/delete_product/{id}', [AdminController::class, 'delete_product']);
Route::get('/delete_coupon/{id}', [WishlistController::class, 'delete_coupon']);
Route::get('/edit_product/{id}', [AdminController::class, 'edit_product']);
Route::get('/edit_coupon/{id}', [WishlistController::class, 'edit_coupon']);
Route::post('update_product/{id}',[AdminController::class,'update_product']);
Route::post('update_coupon/{id}',[WishlistController::class,'update_coupon']);
Route::get('product_details/{id}',[HomeController::class,'product_details']);
Route::post('add_cart/{id}',[HomeController::class,'add_cart']);
Route::get('add_to_cart/{id}',[WishlistController::class,'add_to_cart']);
Route::put('add_cart_size/{id}', [WishlistController::class, 'add_cart_size']);
Route::post('add_wishlist/{id}',[WishlistController::class,'add_wishlist']);
Route::post('adds/{id}',[HomeController::class,'adds']);
Route::get('show_cart',[HomeController::class,'show_cart']);
Route::get('show_wishlist',[WishlistController::class,'show_wishlist']);
Route::get('remove_cart/{id}',[HomeController::class,'remove_cart']);
Route::get('wishl/{id}',[WishlistController::class,'wishl']);
Auth::routes();

// routes/web.php

Route::put('/update_cart_quantity/{itemId}', [CartController::class,'updateCartQuantity'])->name('update_cart_quantity');
Route::post('/update_wishlist/{itemId}', [WishlistController::class, 'update_wishlist'])->name('update_wishlist');


Route::get('cash_order',[OrderController::class,'cash_order']);
// Route::get('stripe/{totalprice}',[OrderController::class,'stripe']);
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::post('stripe/{totalprice}',[OrderController::class, 'stripePost'])->name('stripe.post');
Route::get('/stripe/{totalprice}', [OrderController::class, 'stripe']);
Route::post('/stripe/{totalprice}', [OrderController::class, 'call']);


Route::get('order',[CoronaController::class,'order']);
Route::get('deliver/{id}',[CoronaController::class,'deliver']);
Route::get('print_pdf/{id}',[CoronaController::class,'print_pdf']);
Route::get('send_email/{id}',[CoronaController::class,'send_email']);
Route::post('send_user_email/{id}',[CoronaController::class,'send_user_email']);
Route::get('cancel_order/{id}',[CoronaController::class,'cancel_order']);

Route::get('search',[CoronaController::class,'search']);
Route::get('searching',[ContaceController::class,'searching']);
Route::get('show_order',[CoronaController::class,'show_order']);


Route::get('auth/google',[GoogleAuthController::class,'redirect'])->name('google-auth');
Route::get('auth/google/call-back',[GoogleAuthController::class,'callbackGoogle']);

// Route::get('/cop', function(){
//     return view('coupon.das');
// });
Route::get('copun',[CoronaController::class,'coupon']);
Route::post('/coupons', [CoronaController::class, 'store']);


// routes/web.php

// use App\Http\Controllers\CouponController;

Route::get('/apply-coupon', [HomeController::class, 'show_cart'])->name('coupon.apply.form');
Route::post('/apply-coupon', [HomeController::class, 'applyCoupon'])->name('coupon.apply');
Route::get('/contact', [ContaceController::class, 'contact']);
Route::get('/all_messages', [ContaceController::class, 'all_messages']);
Route::post('/contac', [ContaceController::class, 'contac']);

