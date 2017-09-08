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

Route::get('/','Site\SiteMonitor@index');
Route::get('/topic/{slug}','Site\SiteMonitor@loadFullPost');

Route::group(['prefix'=>'user'], function(){
   Route::get('/register','User\UserManagement@create');
   Route::post('/register','User\UserManagement@store');

   Route::get('/post/create','Post\PostController@create');
});

Route::group(['prefix'=>'admin'], function(){

});

