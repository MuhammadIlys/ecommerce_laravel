<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admincontroller;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',[HomeController::class,'index'])->name('index');
Route::get('/redirect',[HomeController::class,'redirect']);
Route::get('/view_category',[AdminController::class,'view_category']);
Route::post('/add_category',[AdminController::class,'add_category']);
Route::get('/delete_category/{id}',[AdminController::class,'delete_category']);
Route::get('/update_category/{id}',[AdminController::class,'update_category']);

Route::get('/view_product',[Admincontroller::class,'view_product']);
Route::post('/add_product',[Admincontroller::class,'add_product']);
Route::get('/show_product',[Admincontroller::class,'show_product']);

Route::get('/delete_product/{id}',[Admincontroller::class,'delete_product']);
Route::get('/edit_product/{id}',[Admincontroller::class,'edit_product']);
Route::post('/update_product/{id}',[Admincontroller::class,'update_product']);

Route::get('/product_search',[HomeController::class,'product_search']);
Route::get('/product_searchh',[HomeController::class,'product_searchh']);

Route::get('/order',[Admincontroller::class,'order']);
Route::get('/delivered/{id}',[Admincontroller::class,'delivered']);
Route::get('/search',[Admincontroller::class,'search']);
Route::get('/print_pdf/{id}',[Admincontroller::class,'print_pdf']);
Route::get('/order_pdf',[Admincontroller::class,'order_pdf']);
Route::get('/order_details',[HomeController::class,'order_details']);
Route::get('/cancel_order/{id}',[HomeController::class,'cancel_order']);
Route::get('/delete_order/{id}',[HomeController::class,'delete_order']);


Route::get('/pro',[HomeController::class,'pro']);
Route::get('/contact',[HomeController::class,'contact']);
Route::get('/blog',[HomeController::class,'blog']);
Route::get('/practice',[Admincontroller::class,'practice']);



Route::get('/product_details/{id}',[HomeController::class,'product_details']);
Route::post('/add_cart/{id}',[HomeController::class,'add_cart']);
Route::get('/show_cart',[HomeController::class,'show_cart']);
Route::get('/remove_cart/{id}',[HomeController::class,'remove_cart']);

Route::get('/cash_order',[HomeController::class,'cash_order']);

Route::get('/stripe/{total_price}',[HomeController::class,'stripe']);

Route::post('stripe/{total_price}',[HomeController::class,'stripepost'])->name('stripe.post');

Route::get('/test',[Admincontroller::class,'test']);





Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
