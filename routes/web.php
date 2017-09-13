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

   Route::post('/post/react','Post\PostReactionController@reactToPost');

   Route::post('/comment','Comments\CommentController@store');

   Route::post('/comment/react','Comments\CommentReactionController@reactToComment');
});

Route::resource('category','PostCategoryController');
Route::resource('subcategory','PostSubCategoryController');

Route::group(['prefix'=>'admin'], function(){

    Route::get('/','Admin\User\UserController@loadLogin');
    Route::get('/dashboard','Admin\User\UserController@loadDashboard');

    Route::post('/login','Admin\User\UserController@login');

    Route::get('/user/create','Admin\User\UserController@showApproveAdmin');
    Route::post('/user/details','Admin\User\UserController@returnUserDetails');
    Route::post('/user/create','Admin\User\UserController@approveAdmin');
    Route::post('/user/delete','Admin\User\UserController@removeAdmin');
    Route::get('/user/list','Admin\User\UserController@listAdminUsers');


    Route::get('/category/create','Admin\Category\CategoryController@create');
    Route::post('/category/create','Admin\Category\CategoryController@store');

    Route::get('/category/list','Admin\Category\CategoryController@index');

    Route::get('/sub-category/create','Admin\Category\SubCategoryController@create');
    Route::post('/sub-category/create','Admin\Category\SubCategoryController@store');

    Route::get('/sub-category/list','Admin\Category\SubCategoryController@index');
});

Route::get('/signout','Site\SiteMonitor@signOut');

