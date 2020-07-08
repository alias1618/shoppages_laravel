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
    return view('welcome');
});


/*
Route::get('/login',array('as' => 'login', 'uses' => 'LoginController@index'));
Route::post('login','LoginController@index');
Route::get('/logout','LoginController@logout');

Route::group(['before'=>'auth'], function(){
    Route::get('member', 'MemberController@index');
    Route::post('member/update', 'MemberController@update');
    Route::get('order', 'MemberController@index');    
});

Route::group(array('before' => 'auth'), function()
{
    Route::get('user/logout', ['as' => 'logout', 'uses' => 'UserController@getLogout']);
    Route::get('user/dashboard', ['as' => 'dashboard', 'uses' => 'UserController@getDashboard']);
});
*/
Route::get('/home', 'HomeController@index')->name('home');
/*
Route::get('/error', function (){
    return view('/error');
});

Auth::routes();
*/
// 登入、登出
Route::get('login', 'Auth\LoginController@showLoginForm')
    ->name('login');

Route::post('login', 'Auth\LoginController@login');

Route::post('logout', 'Auth\LoginController@logout')
    ->name('logout');

// 註冊
Route::get('register',
    'Auth\RegisterController@showRegistrationForm')
    ->name('register');

Route::post('register',
    'Auth\RegisterController@register');

// 重設密碼
Route::get('password/reset',
    'Auth\ForgotPasswordController@showLinkRequestForm')
    ->name('password.request');

Route::post('password/email',
    'Auth\ForgotPasswordController@sendResetLinkEmail')
    ->name('password.email');

Route::get('password/reset/{token}',
    'Auth\ResetPasswordController@showResetForm')
    ->name('password.reset');

Route::post('password/reset',
    'Auth\ResetPasswordController@reset')
    ->name('password.reset.update');





Route::get('product', 'Product\ProductController@management')
->name('product');

Route::any('productAdd', 'Product\ProductController@add')
->name('productAdd');


Route::get('toedit_prodcut/{product_id}', [
    'as' => 'toedit_prodcut',
    'uses' => 'Product\ProductController@toedit'
]);

Route::any('add',[
    'as' => 'add',
    function() {
        //echo 123456;
    //return redirect()->route('productAdd');
    //return redirect('productAdd');
    //return Redirect::to('productAdd');
    return view('management/product_add');
}]);

Route::post('editproduct_update', 'Product\ProductController@toupdate')
        ->name('editproduct_update');

//上傳檔案
Route::get('file-upload', 'FileUploadController@fileUpload')->name('file.upload');
Route::post('file-upload', 'FileUploadController@fileUploadPost')->name('file.upload.post');

/*
Route::get('index', [
    'as'  => 'index',
    'user' => 'Customer\CustomerController@showindex'
]);
*/
Route::any('index', [
    'as'  => 'index',
    'uses' => 'Customer\CustomerController@showindex'
]);

Route::get('detail/{product_id}', [
    'as'  => 'detail',
    'uses' => 'Customer\CustomerController@showdetail'
]);
//{product_id}/{buynumber}
Route::post('cart/', [
    'as'  => 'cart',
    'uses' => 'Customer\CustomerController@putincart'
]);

Route::get('product_delete/{key_01}}', [
    'as'  => 'product_delete',
    'uses' => 'Customer\CustomerController@deletecart'
]);

Route::post('product_number_change/', [
    'as'  => 'product_number_change',
    'uses' => 'Customer\CustomerController@changecart'
]);


Route::get('check_infor', function () {
    
    return view('shop/information');
})->name('check_infor');

Route::post('check_detail', [
    'as'  => 'check_detail',
    'uses' => 'Customer\CustomerController@checkdetail'
]);

Route::post('buy_detail', [
    'as'  => 'buy_detail',
    'uses' => 'Customer\CustomerController@buydetail'
]);


Route::get('test', function () {
    
    return view('shop/test');
})->name('test');