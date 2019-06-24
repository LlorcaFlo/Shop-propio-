<?php

use App\Category;
use Illuminate\Support\Facades\Route;


//Usuarios
Route::get('/user', 'UserController@index')->name('user.index');
Route::get('/user/edit', 'UserController@edit')->name('user.edit');


Route::get ('payment', 'PaypalController@postPayment')->name ('payment');
Route::get ('payment/status', 'PaypalController@getPaymentStatus')->name ('payment.status');

Route::get('/set_language/{lang}', 'Controller@setLanguage')->name ('set_language');

Route::get ( '/', function () {
   $categories = Category::has ( 'products' )->get ();
   //dd($categories);
   return view ( 'welcome', compact ( 'categories' ) );
});

Auth::routes ();


//PDFS
Route::get('/imprimir', 'PdfController@show')
      ->name('download_pdf');


Route::get ( '/home', 'HomeController@index' )->name ( 'home' );

Route::get ( '/search', 'SearchController@show' )->name ('search_product');
Route::get ( '/products/json', 'SearchController@data' );

Route::get ( '/carts_pending', 'CartController@show_carts_pending')->name ('show_carts_pending');

Route::get ( '/products/{product}', 'ProductController@show' )->name ('product_show');

Route::get ( '/categories/{category}', 'CategoryController@show' )->name ('category_show');


Route::get ('/order/user/{id}', 'CartController@show_order')->name ('orderes_user');

Route::get('user/pendings/{id}', 'CartController@show_pending')->name('user_pendings');




Route::post ( '/carts', 'CartDetailController@store' )
   ->name('cartDetail_store');

Route::delete ( '/carts/{detail}', 'CartDetailController@destroy' )
   ->name('cartDetail_destroy');

Route::post ( '/carts/{detail}', 'CartDetailController@update' )
->name('cartDetail_update');

Route::post ( '/updateWithModal', 'CartDetailController@updateWithModal')->name ('cartDetail_updateWithModal');

Route::post ( '/order', 'CartController@update' )->name ('place_order');

Route::middleware ( [ 'auth', 'admin' ] )->prefix ( 'admin' )->namespace ( 'Admin' )->group ( function () {
   
   //Providers
   Route::put ('/providers/products', 'ProductController@purchase')
         ->name('product_purchase');
   Route::get('/providers','ProviderController@index')->name('admin_providers_index');

   //Users
   Route::get('/users', 'UsersController@index')->name('users.index');
   // Route::get('/users', 'UsersController@indexOrder')->name('users.order');

   Route::get('/users/show/{user}', 'UsersController@show')->name('users.show');
   Route::get ( '/users/create', 'UsersController@create' )->name ( 'users.create' );
   Route::post ( '/users', 'UsersController@store' )->name ( 'users.store' );
   Route::get ( '/users/edit/{user}', 'UsersController@edit' )->name ( 'users.edit' );
   Route::post ( '/users/{user}', 'UsersController@update' )->name ( 'users.update' );
   Route::delete ( '/users/{user}', 'UsersController@destroy' )->name ( 'users.destroy' );




   Route::get ( '/products', 'ProductController@index' )->name ('admin_products_index');
 //  Route::get ( '/sort/{column}', 'ProductController@sort' )->name ('admin_products_sort');
   Route::get ( '/products/create', 'ProductController@create' )->name ( 'product_create' );
   Route::post ( '/products', 'ProductController@store' )->name ( 'product_store' );
   Route::get ( '/products/{product}', 'ProductController@edit' )->name ( 'product_edit' );
   Route::post ( '/products/{product}', 'ProductController@update' )->name ( 'product_update' );
   Route::delete ( '/products/{product}', 'ProductController@destroy' )->name ( 'product_destroy' );

   Route::get ( '/products/images/{product}', 'ImageController@index' )->name ('product_images_index'); // listado y formulario creación

   Route::post ( '/products/images/{id}', 'ImageController@store' );

   Route::delete ( '/products/images/{id}', 'ImageController@destroy' );

   Route::get ( '/products/image/featured/{id}/{productImage}', 'ImageController@featured' )
      ->name ('product_image_featured'); // destacar un imagen

   Route::get ('/categories', 'CategoryController@index')
      ->name('admin_categories_index'); // listado
   Route::get ( '/categories/create', 'CategoryController@create' )->name ( 'category_create' );
   Route::post ( '/categories', 'CategoryController@store' )->name ( 'category_store' ); // store
   Route::get ( '/categories/{category}', 'CategoryController@edit' )->name ( 'category_edit' );
   Route::put ( '/categories/{category}', 'CategoryController@update' )->name ( 'category_update' );
   Route::delete ( '/categories/{category}', 'CategoryController@destroy' )->name ( 'category_destroy' );

   Route::get ( '/products/stock/{product}', 'StockController@edit' )->name ( 'stock_edit' );
   Route::post ( '/products/stock/{product}', 'StockController@update' )->name ( 'stock_update' );

} );


