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
//Route::get('login','User\UserManagement@showLogin');
Route::get('/topic/{slug}','Site\SiteMonitor@loadFullPost');
Route::get('/category/{slug}','Site\SiteMonitor@loadCategoryPosts');
Route::get('/fetch/category/{id}','Site\SiteMonitor@loadCategoryInfo');

Route::group(['prefix'=>'user'], function(){
   Route::get('/register','User\UserManagement@create');
   Route::post('/register','User\UserManagement@store');

   Route::get('/register/facebook','User\SocialHandler@gotoFacebook');
   Route::get('/register/social/facebook/callback','User\SocialHandler@facebookRegistration');

   Route::get('login','User\UserManagement@showLogin')->name('login');
   Route::post('/login','User\UserManagement@login');


   Route::get('/profile','User\UserManagement@loadProfile')->middleware('auth');
   Route::get('/post/create','Post\PostController@create')->middleware('auth');
   Route::post('/post/create','Post\PostController@store')->middleware('auth');

   Route::post('/post/react','Post\PostReactionController@reactToPost')->middleware('auth');

   Route::post('/comment','Comments\CommentController@store')->middleware('auth');

   Route::post('/comment/react','Comments\CommentReactionController@reactToComment')->middleware('auth');
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

    Route::group(['prefix'=>'polls'], function(){
       Route::get('/','Admin\Polls\PollController@index');
       Route::get('/create','Admin\Polls\PollController@create')->middleware('auth');

       Route::post('/create','Admin\Polls\PollController@store')->middleware('auth');
       Route::post('/make-top','Admin\Polls\PollController@makeTopPost')->middleware('auth');

    });
});

Route::group(['prefix'=>'polls'], function(){

   Route::get('/','User\Poll\PollController@index');
   Route::post('/vote','User\Poll\PollController@processVote');


   Route::get('/details/{slug}','User\Poll\PollController@loadSinglePoll');
});
Route::get('/signout','Site\SiteMonitor@signOut');

