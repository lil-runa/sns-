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

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/home', 'HomeController@index')->name('home');

//Auth::routes();


//ログアウト中のページ
Route::get('/login', 'Auth\LoginController@login');
Route::post('/login', 'Auth\LoginController@login');

Route::get('/register', 'Auth\RegisterController@register');
Route::post('/register', 'Auth\RegisterController@register');

Route::get('/added', 'Auth\RegisterController@added');
Route::post('/added', 'Auth\RegisterController@added');

Route::group(['middleware' => 'auth'], function() {

//ログイン中のページ
Route::get('/top','PostsController@index')->middleware('auth');

Route::get('/profile','UsersController@profile');

//Route::get('users/{id}/otherProfile', 'UsersController@userProfile');
Route::get('users/{id}/otherProfile', 'FollowsController@otherPost');
//プロフィール編集
Route::put('/top', 'UsersController@profileUpdate')->name('profile_edit');

Route::get('/search','UsersController@index');

Route::get('/follow-list','FollowsController@followList');
Route::get('/follower-list','FollowsController@followerList');

Route::get('/logout', 'Auth\LoginController@logout');

Route::get('/top', 'PostsController@index');
Route::post('/top', 'PostsController@create');

Route::put('post/{id}/top', 'PostsController@updateForm');
Route::post('post/{id}/top', 'PostsController@update');

Route::get('post/{id}/top', 'PostsController@delete');


    // フォロー/フォロー解除を追加
    Route::post('users/{id}/follow', 'FollowsController@follow')->name('follow');
    Route::delete('users/{id}/unfollow', 'FollowsController@unfollow')->name('unfollow');

});
