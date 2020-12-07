<?php

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

/*============================== Home Route ==================================*/
  Route::get('/','HomeController@index');
  Route::post('/search','HomeController@search');
  Route::get('/place-search','HomeController@placeSearch');
  Route::get('/contact','HomeController@contact');
  Route::get('/about','HomeController@about');
  Route::get('/shops','HomeController@shops');
  Route::get('/shops/{shop}','HomeController@shop');
  Route::get('/add-to-cart/{product}','CartController@addToCart');
  Route::get('/cart/count','CartController@returnCartCount');
  Route::get('/cart','CartController@index');
  Route::get('/cart/destroy/{item}','CartController@destroy');
  Route::post('/cart/update-quantity/{item}','CartController@update');
  Route::get('/order', 'OrderController@index');
  Route::delete('/order/{order}', 'OrderController@destroy');
  Route::get('/order/checkout', 'OrderController@create');
  Route::post('/order/checkout', 'OrderController@store');
/*============================== Home Route ==================================*/


##################################### PAYMENT ROUTE ##########################################
Route::get('/order/payment/{order}', 'OrderController@payment')->name('order.payment');
Route::post('/order/payment/{order}', 'OrderController@processPayment')->name('order.payment');
// Route::get('/order/payment/callback', 'OrderController@handleGatewayCallback');
Route::get('/order/payments/callback','OrderController@handleGatewayCallback');
Route::get('/order/confirmation/{order}','OrderController@confirmation')->name('order.confirmation');
##################################### PAYMENT ROUTE ##########################################

##################################### SOCIALITE ##########################################
    Route::get('login/{provider}', 'Auth\LoginController@redirectToProvider');
    Route::get('login/{provider}/callback', 'Auth\LoginController@handleProviderCallback');
##################################### SOCIALITE ##########################################

Route::impersonate();
Auth::routes(['verify' => true]);
Route::get('/logout', ['uses' => '\App\Http\Controllers\Auth\LoginController@logout']);

Route::get('/customer/profile', 'CustomerController@profileCustomer');
Route::post('/customer/profile', 'CustomerController@updateProfileCustomer');

Route::webhooks('paystack-webhook');
