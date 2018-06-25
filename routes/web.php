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

Route::get('/', 'HomepageUIController@index');
Route::get('/products', 'HomepageUIController@getProductPage');
Route::get('/blogs', 'HomepageUIController@getBlogPage');
Route::get('/products/{id}', 'HomepageUIController@getProductDetailPage');
Route::get('/blogs/{id}', 'HomepageUIController@getBlogDetailPage');

Route::get('/about', function () {
    return view('UI.about');
});

Auth::routes();

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

Route::get('/admin-product', 'ProductController@index');
Route::get('/upload-product', 'ProductController@viewUpload');
Route::post('/admin-product/upload', 'ProductController@upload');
Route::get('/admin-editProduct/{id}', 'ProductController@getDetail');
Route::post('/admin-product/edit/', 'ProductController@edit');
Route::get('/admin-deleteProduct/{id}', 'ProductController@delete');
