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
Route::get('/category/{slug}','Site\SiteMonitor@loadCategoryPosts');

Route::group(['prefix'=>'user'], function(){
   Route::get('/register','User\UserManagement@create');
   Route::post('/register','User\UserManagement@store');

   Route::get('/register/facebook','User\SocialHandler@gotoFacebook');
   Route::get('/register/social/facebook/callback','User\SocialHandler@facebookRegistration');

   Route::get('login','User\UserManagement@showLogin');
   Route::post('/login','User\UserManagement@login');


   Route::get('/profile','User\UserManagement@loadProfile');
   Route::get('/post/create','Post\PostController@create');
   Route::post('/post/create','Post\PostController@store');

   Route::post('/comment','Comments\CommentController@store');
});

Route::resource('category','PostCategoryController');
Route::resource('subcategory','PostSubCategoryController');

Route::group(['prefix'=>'admin'], function(){

});

Route::get('/signout','Site\SiteMonitor@signOut');

