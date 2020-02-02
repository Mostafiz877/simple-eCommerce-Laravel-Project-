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



Route::get('/contact','FrontendController@contact');
Route::get('/about','FrontendController@about');
Route::get('/','FrontendController@index');
Route::get('/add/product/view','ProductController@addproductview');
Route::post('/add/product/insert','ProductController@addproductinsert');
Route::get('/delete/product/{product_id}','ProductController@deleteproduct');
Route::get('/edit/product/{product_id}','ProductController@editproduct');
Route::post('/edit/product/insert','ProductController@editproductinsert');
Route::get('product/details/{product_id}','FrontendController@productdetails');
Route::get('restore/product/{product_id}','ProductController@restoreproduct');
Route::get('force/delete/product/{product_id}','ProductController@forcedeleteproduct');
Route::get('contact/message/view','HomeController@contactmessageview');

Route::get('change/menu/status/{category_id}','HomeController@changemenustatus');
Route::get('message/read/{message_id}','HomeController@messageread');


Route::get('add/category/view','CategoryController@addcategoryview');
Route::post('/add/category/insert','CategoryController@addcategoryinsert');
Route::post('/contact/insert','FrontendController@contactinsert');
Route::get('/category/wise/product/{category_id}','FrontendController@categorywiseproduct');
Route::get('add/to/cart/{product_id}','FrontendController@addtocart');
Route::get('/cart','FrontendController@cart');
Route::get('delete/from/cart/{cart_id}','FrontendController@deletefromcart');
Route::get('clear/cart','FrontendController@clearcart');





// Route::get('about',function()
// {
// 	return view('about');
// });




// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
