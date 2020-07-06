
<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your applicatio;;n. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Auth::routes(['verify' => true]);
// Customer Dashboard... 
Route::get('/dashboard', 'Frontend\CustomerController@customerDashboard')->name('customer.dashboard')->middleware('verified');
//** Frontend Route Here **//
Route::get('/', 'FrontendController@index');
// Customer Route... 
Route::get('customer/logout', 'Frontend\CustomerController@customerLogout')->name('customer.loguot');
Route::get('verify/email', 'Frontend\CustomerController@verifyEmail');
  // Customer Profile Update.. 
Route::get('my/profile/edit', 'Frontend\CustomerController@CustomerProfileEdit')->name('customer.profile.edit');
Route::put('my/profile/update', 'Frontend\CustomerController@customerProfileUpdate')->name('customer.profile.update');
 // Customer Password Change Route..
Route::get('my/password/change', 'Frontend\CustomerController@customerPasswordChange')->name('customer.password.change');
Route::post('my/password/update', 'Frontend\CustomerController@customerPasswordUpdate')->name('customer.password.update');
 // Customer wishlist.. 
Route::get('/wishlist/{id}', 'Frontend\wishlistController@wishlist')->name('customer.wishlist');
//** Admin Route Here **//

Route::get('admin/dashboard','AdminController@index');
   // Admin Authentication Route...
 Route::get('admin', 'Admin\Auth\LoginController@showLoginForm')->name('admin.login');
 Route::post('admin', 'Admin\Auth\LoginController@login');
 Route::get('admin/logout','AdminController@logout')->name('admin.logout');
//** Admin Route Group **//

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => 'auth:admin'], function () {
    // Admin Profile Update Route..
 Route::get('/profile', 'Auth\ProfileController@index')->name('profile');
 Route::put('/profile/update', 'Auth\ProfileController@profileUpdate')->name('profile.update');
   // Admin Password Change Route..
 Route::post('/password/update', 'Auth\ProfileController@passwordUpdate')->name('password.update');
   // Catgegory Route..
 Route::resource('category', 'category\categoryController');
   // subCatgegory Route..
 Route::resource('subcategory', 'category\subCategoryController');
   // Brand Route..
 Route::resource('brand', 'category\brandController');
   // coupns Route..
 Route::resource('coupon', 'coupon\couponController');
   // Product Route..
 Route::resource('product', 'product\productController');
   // Product Active... 
 Route::get('/product/active/{id}', 'product\productController@productActive')->name('product.active');
   // Product Inactive... 
 Route::get('/product/inactive/{id}', 'product\productController@productInactive')->name('product.inactive');
   // Subcategory Get By Ajax
 Route::get('/product/subcategory/get', 'product\productController@subCategoryGet')->name('product.sub.get');
  // Post Category Route... 
 Route::resource('postcategory', 'blog\categoryController');
  // Post Route... 
 Route::resource('post', 'blog\postController');


});
