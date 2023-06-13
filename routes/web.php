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


Route::get('/', "FrontendController@index" );

    Route::get('/admin', "AdminController@index" );
    
    Route::get('/admin/categories', "AdminController@categories" );

   Route::get('/admin/create/category', "AdminController@create" );
   
   
   Route::post('/admin/create/category', "AdminController@storeCategories" );
   
   Route::get('/admin/category/{category}/edit', "AdminController@editCategory" );
   Route::put('/admin/category/{category}/edit', "AdminController@updateCategory" );
   Route::delete('/admin/category/{category}', "AdminController@deleteCategory" );

 Route::get('/admin/products', "AdminController@products" );
 Route::get('/admin/create/products', "AdminController@productscreate" );
 Route::post('/admin/create/products', "AdminController@productsStore" );

Route::get('/home', "HomeController@index")->name('home');
Route::delete('/admin/product/{product}', "AdminController@productDelete");
Route::get('/admin/product/{product}/edit', "AdminController@productEdit");
Route::put('/admin/product/{product}/edit', "AdminController@productUpdate");
Route::get('/admin/clothes/sizes', "AdminController@clothesSizes");
Route::get('/admin/create/clothes/sizes',"AdminController@createSizes");
Route::post('/admin/create/clothes/sizes',"AdminController@storeSizes");
Route::get('/admin/clothes/size/{size}/edit',"AdminController@editSizes");
Route::put('/admin/clothes/size/{size}/edit',"AdminController@updateSizes");
Route::delete('/admin/clothes/size/{size}',"AdminController@deleteSizes");  
Route::get('/admin/banners', "AdminController@banners");
Route::get('/admin/create/banner', "AdminController@createBanner");
Route::post('/admin/create/banner', "AdminController@storeBanner");
Route::delete('/admin/banner/{banner}',"AdminController@deleteBanner");
Route::get('/admin-henna-tatoo',"AdminController@gallery");
Route::get('/admin/create/gallery',"AdminController@createGallery");
Route::post('/admin/create/gallery',"AdminController@storeGallery");
Route::get('/product/{product}', "HomeController@singleProduct");

Route::get('/admin/tatoo/gallery/{gallery}/edit',"AdminController@editgallery");
Route::put('/admin/tatoo/gallery/{gallery}/edit',"AdminController@updategallery");
Route::post('/product/{product}', "HomeController@Cartstore");
Route::delete('/admin/tatoo/{gallery}',"AdminController@deletegallery");
Route::get('/cart', "HomeController@cart")->name('chekout');
Route::put('/cart/{cart}', "HomeController@Updatecart");
Route::delete('/cart/{cart}', "HomeController@Deletecart");
Route::get('/henna-tatoo',"HomeController@hennaTatoo");
Route::get('/about-contact',"HomeController@about");
Route::post('/about-contact',"HomeController@sendMail");
Route::get('/charge',"StripeController@charge");
Route::get('/confirm',"StripeController@confirm");

Route::get('/category/{category}/products', "HomeController@categoryProducts");
Route::get('/orders', 'HomeController@orders' );
Route::get('/admin-orders', 'AdminController@usersorders' );

Route::put('/admin-orders/{order}', 'AdminController@updateStatus' );

Route::get('/admin/shipped-orders', 'AdminController@shippedOrders' );
Route::get('/paypal-payment','HomeController@paypalPayment');
Route::get('/success','HomeController@success');

Route::get('/admin/dj', 'AdminController@dj' );
Route::get('/dj', 'HomeController@dj' );
Route::get('/admin/create/dj', 'AdminController@createDJ' );
Route::post('/admin/create/dj', 'AdminController@storeDJ' );
Route::delete('/admin/dj/{image}', 'AdminController@deleteDJ' );

Route::get('/delete-account/{user}', 'UserController@delete' );
Route::get('/privacy-policy', 'HomeController@privacy' );
Route::get('/admin/orders/{id}', 'AdminController@invoice' );
Route::post('/vat','StripeController@vat');
Route::get('/dhl','StripeController@dhl');

Route::get('/admin/parcel_size','AdminController@parcels');
Route::get('/admin/create/parcels','AdminController@parcelsAdd');
Route::post('/admin/create/parcels','AdminController@parcelsStore');
Route::get('/admin/parcel/{parcel}/edit','AdminController@parcelsEdit');
Route::put('/admin/parcel/{parcel}/edit','AdminController@parcelsUpdate');
Route::delete('/admin/parcel/{parcel}','AdminController@parcelsDelete');
Auth::routes();





