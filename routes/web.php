
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

Route::get('/', function (){
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//** Admin Route Here **//

Route::get('admin/dashboard','AdminController@index')->name('admin.dashboard');
   // Admin Authentication Route...
 Route::get('admin', 'Admin\Auth\LoginController@showLoginForm')->name('admin.login');
 Route::post('admin', 'Admin\Auth\LoginController@login');
 Route::get('admin/logout','AdminController@logout')->name('admin.logout');

//** Admin Route Group **//

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin'], function () {
    // Admin Profile Update Route..
Route::get('/profile', 'Auth\ProfileUpdate@index')->name('profile');
Route::post('/profile/update', 'Auth\ProfileUpdate@profileUpdate')->name('profile.update');
  // Admin Password Change Route..
Route::get('/password/update', 'Auth\PasswordUpdate@passwordUpdate')->name('password.update');
});


