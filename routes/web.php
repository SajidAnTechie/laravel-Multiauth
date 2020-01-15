<?php


use RealRashid\SweetAlert\Facades\Alert;


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

    // Alert::success('Success Title', 'Success Message');
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/users/logout', 'Auth\LoginController@userlogout')->name('user.logout');

Route::prefix('admin')->group(function () {

    Route::get('/login', 'Adminauth\LoginController@showloginform')->name('admin.loginform');

    Route::post('/login/submit', 'Adminauth\LoginController@Login')->name('admin.login.submit');

    Route::post('/logout', 'Adminauth\LoginController@logout')->name('admin.logout');

    Route::get('/dashboard', 'AdminController@index')->name('admin.dashboard');


    //Admin forgot password reset route

    Route::post('password/email', 'Adminauth\AdminForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
    Route::get('password/reset', 'Adminauth\AdminForgotPasswordController@showLinkRequestform')->name('admin.password.request');
    Route::post('password/reset', 'Adminauth\AdminResetPasswordController@reset')->name('admin.password.update');
    Route::get('password/reset/{token}', 'Adminauth\AdminResetPasswordController@showResetform')->name('admin.password.reset');
});

//Admin Pages Controller
Route::prefix('admin/dashboard')->group(function () {

    Route::get('/Users', 'AdminPageController@users')->name('admin.dasboard.users');
    Route::get('/Users/show/{user}', 'AdminPageController@user_show')->name('user.show');
    Route::delete('/Users/delete/{user}', 'AdminPageController@delete')->name('user.delete');
    Route::get('/Admins', 'AdminPageController@admins')->name('admin.dasboard.admins');
    Route::delete('/Admins/delete/{admin}', 'AdminPageController@admin_delete')->name('admin.delete');

    //Admins Posts route

    Route::get('/posts', 'AdminPostsController@index')->name('admin.dasboard.posts');
    Route::get('/posts/create', 'AdminPostsController@create')->name('posts.create');
    Route::post('/posts/save', 'AdminPostsController@store')->name('posts.store');
    Route::get('/admin/posts', 'AdminPostsController@admin_posts')->name('admin.posts');
    Route::get('/Admins/show/{admin}', 'AdminPageController@show')->name('admins.show');
    Route::get('/Admins/create', 'AdminPageController@admin_create')->name('admin.create');
    Route::post('/Admins/create/store', 'AdminPageController@admin_store')->name('admin.store');
    Route::get('/Admins/{admin}/edit', 'AdminPageController@admin_edit')->name('admin.edit');
    Route::put('/Admins/edit/store/{admin}', 'AdminPageController@admin_editsave')->name('admin.edit.store');
    Route::get('/Admins/create/user', 'AdmincreateuserController@index')->name('admin.create.user');
    Route::post('/Admins/create/user/store', 'AdmincreateuserController@store')->name('admin.create.users.store');
});
