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

// Route::get('/', function () {
//     return view('demo');
// });
Route::get('/','WelcomeController@index');

Route::get('/category-view/{id}','WelcomeController@category');

Route::get('/contact','WelcomeController@contact');

Route::get('/quickView/{id}/{product_name}','WelcomeController@quickView');


Auth::routes();

Route::get('/dashboard', 'HomeController@index')->name('dashboard');

//category info
Route::get('/category/add', 'CategoryController@createCategory');
Route::post('/category/save', 'CategoryController@storeCategory');
Route::get('/category/manage', 'CategoryController@manageCategory');
Route::get('/category/edit/{id}','CategoryController@editCategory');
Route::post('/category/update', 'CategoryController@updateCategory');
Route::get('/category/delete/{id}','CategoryController@deleteCategory');
//category info

//manufacturer info
Route::get('/manufacturer/add', 'ManufacturerController@createManufacturer')->middleware('shop');
Route::post('/manufacturer/save', 'ManufacturerController@storeManufacturer');
Route::get('/manufacturer/manage', 'ManufacturerController@manageManufacturer')->middleware('shop');
Route::get('/manufacturer/edit/{id}','ManufacturerController@editManufacturer')->middleware('shop');
Route::post('/manufacturer/update', 'ManufacturerController@updateManufacturer')->middleware('shop');
Route::get('/manufacturer/delete/{id}', 'ManufacturerController@deleteManufacturer')->middleware('shop');
//category info

//product info
Route::get('/product/add', 'ProductController@createProduct');
Route::post('/product/save', 'ProductController@storeProduct');
Route::get('/product/manage', 'ProductController@manageProduct');
Route::get('/product/view/{id}', 'ProductController@viewProduct');
Route::get('/product/edit/{id}','ProductController@editProduct');
Route::post('/product/update', 'ProductController@updateProduct');
Route::get('/product/delete/{id}', 'ProductController@deleteProduct');
//product info
//Add to cart Info
Route::post('/add-to-cart', 'CardController@addTocart');
Route::get('/show/card', 'CardController@showCart');
Route::get('/delete/cart/item/{id}', 'CardController@deleteCartitem');
Route::post('/update/cart/quantity', 'CardController@updateCartquantity');
//add to card info

//cart Info
Route::get('/check-out', 'CheckoutController@index');
Route::post('/customer/register', 'CheckoutController@customerRegister');
Route::post('/checkout/login', 'CheckoutController@customerLoginCheck');
Route::get('/checkout/shipping', 'CheckoutController@shippingForm');
Route::post('/save/shipping_info', 'CheckoutController@saveShipping');
Route::get('/checkout/payment', 'CheckoutController@paymentForm');
Route::post('/order/payment', 'CheckoutController@orderPayment');
Route::get('/complete/order/{id}', 'CheckoutController@completeOrder');


//customer info
Route::post('/customer/logout', 'CheckoutController@customerLogout');
Route::get('new/customer/login', 'CheckoutController@newCustomerLogin');
//customer info


//order manage info
Route::get('order/manage/', 'orderController@manageOrder');
Route::get('order/view/details/{id}', 'orderController@viewOrderDetails');
Route::get('view/order/invoice/{id}', 'orderController@viewOrderinvoice');
Route::get('order/delete/{id}', 'orderController@deleteOrder');
//order manage info