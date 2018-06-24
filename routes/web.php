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

Route::get('/', function () {
    return view('UI.index');
});

Route::get('/blog', function () {
    return view('UI.blog');
});

Route::get('/product', function () {
    return view('UI.product');
});

Route::get('/about', function () {
    return view('UI.about');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('/admin', 'AdminController@index');
Route::get('/admin-blog', 'BlogController@index');
Route::get('/upload-blog', 'BlogController@viewUpload');
Route::post('/admin-blog/upload', 'BlogController@upload');
Route::get('/admin-editBlog/{id}', 'BlogController@getDetail');
Route::post('/admin-blog/edit/', 'BlogController@edit');

Route::group(['prefix' => 'api'], function () {
    Route::post('image', ['middleware' => 'auth', 'uses' => 'Api\ImageController@store']);
    Route::get('image/{image}', 'Api\ImageController@view');
});
