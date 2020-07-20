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
route::group(['namespace'=>'blog'],function(){
    // blog routes
    route::get('/blog/{blog}','BlogController@blog')->name('blog.post');
    route::get('/','HomeController@blog')->name('blog.index');
    route::get('/index','HomeController@blog')->name('blog.index');
    route::get('/about','AboutController@about')->name('about');
    route::get('/sidebar','MenuController@menu')->name('menu');


});

//admin controller
route::group(['namespace'=>'admin','middleware'=>'auth'],function(){

    route::get('/admin','HomeController@admin')->name('admin');
    route::resource('/admin/post','PostController');
    route::resource('/admin/category','CategoryController');
    route::resource('/admin/tags','TagController');
    route::resource('/admin/role','RoleController');
    route::resource('/admin/user','UserController');
    route::resource('/admin/permission','PermissionController');

    //about me controller
    route::get('/admin/about','AboutController@index')->name('about.index');
    route::get('/admin/about/{id}','AboutController@edit')->name('about.edit');
    route::post('/admin/about/{id}','AboutController@update')->name('about.update');

    //menu
    route::get('/admin/menu','MenuController@index')->name('menu.index');
    route::get('/admin/menu/{id}','MenuController@edit')->name('menu.edit');
    route::post('/admin/menu/{id}','MenuController@update')->name('menu.update');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
