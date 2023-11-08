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

Auth::routes();

Route::get('/home', function () {
    return redirect('dashboard');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard','DashboardController@index');
    Route::get('/profile','UserController@profile');
    Route::post('/profile/update', 'UserController@updateProfile')->name('updateprofile');
    Route::post('/profile/password-update', 'UserController@updatePassword')->name('updatepassword');
    
    // dealers
    Route::get('dealers', 'DealerController@index');
    Route::get('dealers/toggle/{uid}', 'DealerController@toggleStatus');
    Route::resource('dealer-profile', 'DealerProfileController');

    //car
    Route::resource('cars', 'CarController');
});

Route::get('/', function () {
    return view('static-site/index');
});