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

Route::get('/storage-link',function(){
   Artisan::call('storage:link',[]);
   return 'success';
});

Route::view('/', 'site.pages.homepage')->name('site.pages.homepage');
Route::get('/category/{slug}', 'Site\CategoryController@show')->name('category.show');
Route::get('/product/{slug}', 'Site\ProductController@show')->name('product.show');
Route::get('/search', 'Site\ProductController@search')->name('search');

Route::post('/product/add/cart', 'Site\ProductController@addToCart')->name('product.add.cart');
Route::get('/cart', 'Site\CartController@getCart')->name('checkout.cart');
Route::get('/cart/item/{id}/remove', 'Site\CartController@removeItem')->name('checkout.cart.remove');
Route::get('/cart/clear', 'Site\CartController@clearCart')->name('checkout.cart.clear');

Route::get('/checkout', 'Site\CheckoutController@getCheckout')->name('checkout.index');
Route::post('/checkout/order', 'Site\CheckoutController@placeOrder')->name('checkout.place.order');

Route::get('checkout/payment/complete', 'Site\CheckoutController@complete')->name('checkout.payment.complete');
Route::get('account', 'Site\AccountController@index')->name('account.index');
Route::get('account/address', 'Site\AccountController@editAddress')->name('account.address');
Route::get('account/orders', 'Site\AccountController@getOrders')->name('account.orders');
Route::post('account', 'Site\AccountController@updateInfo')->name('account.updateInfo');
Route::post('account/address', 'Site\AccountController@updateAddress')->name('account.updateAddress');
Route::get('account/orders/{id}', 'Site\AccountController@orderDetails')->name('account.orderDetails');
Route::post('account/order/{order}/cancel','Admin\OrderProcessController@canceled')->name('orders.cancel');


//Route::group(['middleware' => ['auth']], function () {
//    Route::get('/checkout', 'Site\CheckoutController@getCheckout')->name('checkout.index');
//    Route::post('/checkout/order', 'Site\CheckoutController@placeOrder')->name('checkout.place.order');
//
//    Route::get('checkout/payment/complete', 'Site\CheckoutController@complete')->name('checkout.payment.complete');
//
//    Route::get('account/orders', 'Site\AccountController@getOrders')->name('account.orders');
//});

Route::get('create-newsletter','NewsLetterController@create');
Route::post('store-newsletter','NewsLetterController@store')->name('subscribe');

Route::get('stripe', 'StripePaymentController@index')->name('stripe.pay');
Route::post('stripe', 'StripePaymentController@store')->name('stripe.post');
Route::get('about','PagesController@about')->name('about');
Route::get('contact','PagesController@contact')->name('contact');
Route::get('halalcert','PagesController@halalcert')->name('halalcert');
Route::get('faq','PagesController@faq')->name('faq');
Route::get('privacy','PagesController@privacy')->name('privacy');
Route::get('terms','PagesController@terms')->name('terms');
Route::get('refund','PagesController@refund')->name('refund');
Route::get('bankpayment/{order_number}','StripeController@bankpayment');
Route::post('/bankpay', 'StripeController@bankPay')->name('bankpay');

Route::get('/pay', function () {
    return view('pay');
});

# handle payment response from the backend side of it
Route::post('/dopay', 'StripeController@handleonlinepay')->name('dopay');



Route::get('contact-us', 'ContactUSController@contactUS')->name('contact-us');
Route::post('contact-us', ['as'=>'contactus.store','uses'=>'ContactUSController@contactSaveData']);

Route::post('coupons','CouponController@store')->name('coupons.check');

Auth::routes();
require 'admin.php';
