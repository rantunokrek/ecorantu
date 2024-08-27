<?php

use App\Http\Controllers\FrontendController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
//     return view('welcome');
// });

Route::get('/', 'FrontendController@index');

Auth::routes();


Route::group(['prefix'=>'admin','middleware' =>['admin','auth'], 'namespace' =>'admin'], function(){
    Route::get('dashboard', 'AdminController@index')->name('admin.dashboard');
});
Route::group(['prefix'=>'user','middleware' =>['user','auth'], 'namespace' =>'user'], function(){
    Route::get('dashboard', 'UserController@index')->name('user.dashboard');
});



Route::get('/home', 'HomeController@index')->name('home');


Route::post('admin','Admin\LoginController@Login');
Route::get('admin/logout','AdminController@Logout')->name('admin.logout');

// =========== admin controller =======
Route::get('admin/categories','Admin\CategoryController@index')->name('admin.category');
Route::post('admin/categories-store','Admin\CategoryController@StoreCat')->name('store.category');
Route::get('admin/categories/edit/{cat_id}','Admin\CategoryController@Edit')->name('edit.category');
Route::post('admin/categories-update','Admin\CategoryController@update')->name('update.category');
Route::get('admin/categories/delete{cat_id}','Admin\CategoryController@destroy');
Route::get('admin/categories/inactive{cat_id}','Admin\CategoryController@Inactive');
Route::get('admin/categories/active{cat_id}','Admin\CategoryController@Active');
// =================== Brnad ====================
Route::get('admin/brand','Admin\BrandController@index')->name('admin.brand');
Route::post('admin/brand-store','Admin\BrandController@storeBrand')->name('store.brand');
Route::get('admin/brand/edit/{brand_id}','Admin\BrandController@edit')->name('edit.brand');
Route::post('admin/brand-update','Admin\BrandController@update')->name('update.brand');
Route::get('admin/brand/delete{brand_id}','Admin\BrandController@destroy');
Route::get('admin/brand/inactive{brand_id}','Admin\BrandController@inactive');
Route::get('admin/brand/active{brand_id}','Admin\BrandController@active');
