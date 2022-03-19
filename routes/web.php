<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SslCommerzPaymentController;


/*
|--------------------------------------------------------------------------
| Frontend Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', 'App\Http\Controllers\Frontend\PagesController@homepage')->name('homepage');

// All Product and Details Page

Route::get('/all-products', 'App\Http\Controllers\Frontend\PagesController@allProducts')->name('allProducts');
Route::get('{slug}/product-details/', 'App\Http\Controllers\Frontend\PagesController@productDetails')->name('productDetails');
// Category and Sub Category wise product showcasing
Route::get('primarycategory/{id}','App\Http\Controllers\Frontend\PagesController@pcategory')->name('pcategory.show');
Route::get('category/{slug}','App\Http\Controllers\Frontend\PagesController@category')->name('category.show');

// search product
Route::get('/search', 'App\Http\Controllers\Frontend\PagesController@search')->name('search');

//Add to cart

Route::group(['prefix' => 'cart'], function(){
    Route::get('/', 'App\Http\Controllers\Frontend\CartController@index')->name('cart.items');
    Route::post('/store', 'App\Http\Controllers\Frontend\CartController@store')->name('cart.store');
    Route::post('/update/{id}', 'App\Http\Controllers\Frontend\CartController@update')->name('cart.update');
    Route::post('/destroy/{id}', 'App\Http\Controllers\Frontend\CartController@destroy')->name('cart.destroy');



});


Route::get('/checkout', 'App\Http\Controllers\Frontend\PagesController@checkout')->name('checkout');
Route::get('/customer-login', 'App\Http\Controllers\Frontend\PagesController@login')->name('customer-login');

// customer profile
Route::group(['prefix' => 'customer'], function(){
   Route::get('/my-profile', 'App\Http\Controllers\Frontend\CustomerController@index')->name('customer-profile')->middleware('auth','verified');
   Route::get('/profile-update/{id}', 'App\Http\Controllers\Frontend\CustomerController@create')->name('profile.update')->middleware('auth');
   Route::post('/profile-update/{id}', 'App\Http\Controllers\Frontend\CustomerController@store')->name('profile.store')->middleware('auth');

   // order management
   Route::get('/order-history', 'App\Http\Controllers\Frontend\OrderManagementController@index')->name('order-history');

});


// SSLCOMMERZ Start

Route::get('/example2', [SslCommerzPaymentController::class, 'exampleHostedCheckout']);


Route::post('/pay', [SslCommerzPaymentController::class, 'index'])->name('make_payment');
Route::post('/pay-via-ajax', [SslCommerzPaymentController::class, 'payViaAjax']);

Route::post('/success', [SslCommerzPaymentController::class, 'success'])->name('payment_success');
Route::post('/fail', [SslCommerzPaymentController::class, 'fail'])->name('payment_failed');
Route::post('/cancel', [SslCommerzPaymentController::class, 'cancel'])->name('payment_cancel');

Route::post('/ipn', [SslCommerzPaymentController::class, 'ipn']);
//SSLCOMMERZ END




/*
|--------------------------------------------------------------------------
| Backend Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


// Admin Group
Route::group(['prefix' => 'admin'], function(){
    Route::get('/dashboard', 'App\Http\Controllers\Backend\PagesController@dashboard')->name('admin.dashboard')->middleware('auth', 'verified','role');



//Brand Group

Route::group(['prefix' => '/brand'], function(){

    Route::get('/manage', 'App\Http\Controllers\Backend\BrandController@index')->middleware('auth')->name('brand.manage');
    Route::get('/create', 'App\Http\Controllers\Backend\BrandController@create')->middleware('auth')->name('brand.create');
    Route::post('/store', 'App\Http\Controllers\Backend\BrandController@store')->middleware('auth')->name('brand.store');
    Route::get('/edit/{id}',   'App\Http\Controllers\Backend\BrandController@edit')->middleware('auth')->name('brand.edit');
    Route::post('/update/{id}',   'App\Http\Controllers\Backend\BrandController@update')->middleware('auth')->name('brand.update');
    Route::post('/destroy/{id}',   'App\Http\Controllers\Backend\BrandController@destroy')->middleware('auth')->name('brand.destroy');


});


//Category Group

Route::group(['prefix' => '/category'], function(){

    Route::get('/manage', 'App\Http\Controllers\Backend\CategoryController@index')->middleware('auth')->name('category.manage');
    Route::get('/create', 'App\Http\Controllers\Backend\CategoryController@create')->middleware('auth')->name('category.create');
    Route::post('/store', 'App\Http\Controllers\Backend\CategoryController@store')->middleware('auth')->name('category.store');
    Route::get('/edit/{id}','App\Http\Controllers\Backend\CategoryController@edit')->middleware('auth')->name('category.edit');
    Route::post('/update/{id}','App\Http\Controllers\Backend\CategoryController@update')->middleware('auth')->name('category.update');
    Route::post('/destroy/{id}','App\Http\Controllers\Backend\CategoryController@destroy')->middleware('auth')->name('category.destroy');


});
// product Group
Route::group(['prefix' => '/product'], function(){

    Route::get('/manage', 'App\Http\Controllers\Backend\ProductController@index')->middleware('auth')->name('product.manage');
    Route::get('/create', 'App\Http\Controllers\Backend\ProductController@create')->middleware('auth')->name('product.create');
    Route::post('/store', 'App\Http\Controllers\Backend\ProductController@store')->middleware('auth')->name('product.store');
    Route::get('/edit/{id}','App\Http\Controllers\Backend\ProductController@edit')->middleware('auth')->name('product.edit');
    Route::post('/update/{id}','App\Http\Controllers\Backend\ProductController@update')->middleware('auth')->name('product.update');
    Route::post('/destroy/{id}','App\Http\Controllers\Backend\ProductController@destroy')->middleware('auth')->name('product.destroy');


});

// Division Route
Route::group(['prefix' => '/division'], function(){

    Route::get('/manage', 'App\Http\Controllers\Backend\DivisionController@index')->middleware('auth')->name('division.manage');
    Route::get('/create', 'App\Http\Controllers\Backend\DivisionController@create')->middleware('auth')->name('division.create');
    Route::post('/store', 'App\Http\Controllers\Backend\DivisionController@store')->middleware('auth')->name('division.store');
    Route::get('/edit/{id}','App\Http\Controllers\Backend\DivisionController@edit')->middleware('auth')->name('division.edit');
    Route::post('/update/{id}','App\Http\Controllers\Backend\DivisionController@update')->middleware('auth')->name('division.update');
    Route::post('/destroy/{id}','App\Http\Controllers\Backend\DivisionController@destroy')->middleware('auth')->name('division.destroy');


});



// District Route
Route::group(['prefix' => '/district'], function(){

    Route::get('/manage', 'App\Http\Controllers\Backend\DistrictController@index')->middleware('auth')->name('district.manage');
    Route::get('/create', 'App\Http\Controllers\Backend\DistrictController@create')->middleware('auth')->name('district.create');
    Route::post('/store', 'App\Http\Controllers\Backend\DistrictController@store')->middleware('auth')->name('district.store');
    Route::get('/edit/{id}','App\Http\Controllers\Backend\DistrictController@edit')->middleware('auth')->name('district.edit');
    Route::post('/update/{id}','App\Http\Controllers\Backend\DistrictController@update')->middleware('auth')->name('district.update');
    Route::post('/destroy/{id}','App\Http\Controllers\Backend\DistrictController@destroy')->middleware('auth')->name('district.destroy');

});


    Route::group(['prefix' => '/order-management'], function(){

        Route::get('/manage', 'App\Http\Controllers\Backend\OrderController@index')->middleware('auth')->name('order.manage');
        Route::get('/order-details/{id}', 'App\Http\Controllers\Backend\OrderController@show')->middleware('auth')->name('order.details');
        Route::get('/edit/{id}','App\Http\Controllers\Backend\OrderController@edit')->middleware('auth')->name('order.edit');
        Route::post('/update/{id}','App\Http\Controllers\Backend\OrderController@update')->middleware('auth')->name('order.update');
        Route::post('/destroy/{id}','App\Http\Controllers\Backend\OrderController@destroy')->middleware('auth')->name('order.destroy');


});

});

require __DIR__.'/auth.php';

