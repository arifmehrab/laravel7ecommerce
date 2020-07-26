
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

 // Sociallight login route.. 
 Route::get('/login/github', 'Auth\LoginController@redirectToProvider');
 Route::get('/login/github/callback', 'Auth\LoginController@handleProviderCallback');


//==================================== Frontend Customer Route Here ===============================================
//=================================================================================================================//

 // Customer Dashboard... 
 Route::get('/dashboard', 'Frontend\CustomerController@customerDashboard')->name('customer.dashboard')->middleware('verified');

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
 Route::get('/wishlist', 'Frontend\wishlistController@wishlist')->name('customer.wishlist');
 // Customer wishlist View.. 

 //==================================== Frontend product Route Here ======================================
//==========================================================================================================//

 Route::get('/user/wishlist', 'Frontend\wishlistController@wishlistView')->name('customer.wishlist.view');
 // Product Details Route.. 
 Route::get('product/details/{id}/{product_name}', 'Frontend\productController@productDetails')->name('product.details');
 // Product view By Ajax.. 
 Route::get('/product/view', 'Frontend\productController@productView')->name('product.view');
 // Category Products Route.. 
 Route::get('/products/category/{id}/{catname}', 'Frontend\productController@CategoryProducts')->name('category.products');
 // Sub Category Products Route.. 
 Route::get('/products/{id}/{subcatname}', 'Frontend\productController@subCategoryProducts')->name('subcategory.products');

//==================================== Frontend Blog & Language Route Here ======================================
//==========================================================================================================//

  // Blog Post Show.. 
 Route::get('/blog/post', 'Frontend\blogController@blogPost')->name('blog.post');
  // Language.. 
 Route::get('/english/language', 'Frontend\blogController@englishLanguage')->name('english.language');
 Route::get('/bangla/language', 'Frontend\blogController@banglaLanguage')->name('bangla.language');

//==================================== Frontend Payment Route Here ======================================
//==========================================================================================================//

 // Payment Page..
 Route::get('/payment/page', 'Frontend\paymentController@paymentPage')->name('payment.page');
 // Payment Process..
 Route::post('/payment/process', 'Frontend\paymentController@paymentProcess')->name('payment.process');
 // Strip payment charge.. 
 Route::post('/stripe/charge', 'Frontend\paymentController@stripeCharge')->name('stripe.charge');
 // Order Tracking
 Route::post('/order/track', 'Frontend\orderTrackingController@orderTracking')->name('order.tracking');

//==================================== Cart Route Here ===================================================
//==========================================================================================================//

 // Cart Add.. 
 Route::get('/add/card', 'Frontend\cardController@addToCard')->name('add.to.card');
 // Cart Add By Product Details.. 
 Route::post('/add/product/card/{id}', 'Frontend\cardController@addProductCard')->name('add.product.card');
 // Cart Product Lists.. 
 Route::get('/cart/product/lists', 'Frontend\cardController@cartProductList')->name('card.product.list');
 // Cart Product Remove.. 
 Route::get('/cart/product/remove/{rowId}', 'Frontend\cardController@cartProductRemove')->name('cart.product.remove');
 // Cart Product Update.. 
 Route::post('/cart/product/update/{id}', 'Frontend\cardController@cartProductUpdate')->name('cart.product.update');
 // Product Insert Cart ..
 Route::post('/product/insert/cart', 'Frontend\cardController@productCartInsert')->name('product.cart.insert');
 // Product Checkout ..
 Route::get('/user/checkout', 'Frontend\cardController@userCheckout')->name('user.checkout');
 // coupon Apply ..
 Route::post('/coupon', 'Frontend\cardController@userCoupon')->name('user.coupons');
 // coupon Apply ..
 Route::get('/coupon/remove', 'Frontend\cardController@userCouponRemove')->name('user.coupons.remove');

//==================================== Admin Route Here ===================================================
//==========================================================================================================//

Route::get('admin/dashboard','AdminController@index');
   // Admin Authentication Route...
 Route::get('admin', 'Admin\Auth\LoginController@showLoginForm')->name('admin.login');
 Route::post('admin', 'Admin\Auth\LoginController@login');
 Route::get('admin/logout','AdminController@logout')->name('admin.logout');

//**========================================== Admin Route Group ===============================================**//

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
 //**============================ Admin Order Route ====================================**//
 Route::get('/order/view/{id}', 'order\orderController@orderView')->name('order.view');
  // Pending Order
 Route::get('/pending/orders', 'order\orderController@pendingOrder')->name('pending.order');
 Route::get('/order/accept/{id}', 'order\orderController@orderAccept')->name('order.accept');
 Route::get('/order/payment/accept', 'order\orderController@orderPaymentAccept')->name('order.payment.accept');
  // Prograss Order
 Route::get('/order/prograss', 'order\orderController@orderPrograss')->name('order.prograss');
 Route::get('/order/prograss/status/{id}', 'order\orderController@orderPrograssStatus')->name('order.prograss.status');
  // Delievered Order
 Route::get('/order/delivered', 'order\orderController@orderDelivered')->name('order.delivered');
 Route::get('/order/delivered/status/{id}', 'order\orderController@orderDeliveredStatus')->name('order.delivered.status');
  // Cancle order
 Route::get('/order/cancled', 'order\orderController@orderCancled')->name('order.cancled');
 Route::get('/order/cancle/{id}', 'order\orderController@orderCancle')->name('order.cancle');
 //**============================ Admin settings Route ====================================**//
 Route::get('/seo', 'setting\settingController@seo')->name('seo');
 Route::put('/seo/update/{id}', 'setting\settingController@seoUpdate')->name('seo.update');
});
