<?php

use Illuminate\Support\Facades\Route;
use App\Models\DealerProfile;
use Illuminate\Http\Request;
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

Route::get('/home', function (Request $request) {
    $user=$request->user();
    if($user->dealerProfile)
        return redirect('dashboard');
    else
        return redirect('dealer-profile');
});

Route::middleware(['auth'])->group(function () {
    Route::get('verification-pending','UserController@verificationPending');
});

Route::middleware(['auth','active'])->group(function () {
    Route::get('/dashboard','DashboardController@index');
    Route::get('/profile','UserController@profile');
    Route::post('/profile/update', 'UserController@updateProfile')->name('updateprofile');
    Route::post('/profile/password-update', 'UserController@updatePassword')->name('updatepassword');
    
    // dealers
    Route::group(['middleware' => ['permission:view-dealers']], function () {
        Route::get('dealers', 'DealerController@index');
        Route::get('dealers/toggle/{uid}', 'DealerController@toggleStatus');
    });
    Route::resource('dealer-profile', 'DealerProfileController');

    Route::group(['middleware' => ['permission:view-cars']], function () {
        //car
        Route::resource('cars', 'CarController');
        Route::resource('cars-sold', 'SoldHistoryController');

        Route::post('cars/img/upload', 'CarController@uploadImage');
        Route::get('cars/img/remove/{id}', 'CarController@removeImage');

        Route::post('cars/video/upload', 'CarController@uploadVideo');
        Route::get('cars/video/remove/{id}', 'CarController@removeVideo');

        Route::get('search-cars', 'CarController@searchCarsPage');
        Route::get('filter-cars', 'CarController@searchCars');
        Route::post('cars/add-sold', 'CarController@uploadImage');
    });

    

    //enquiry
    Route::group(['middleware' => ['permission:view-enquiry']], function () {
        //car
        Route::resource('enquiry', 'EnquiryController');
    });
    
    

    Route::group(['middleware' => ['role_or_permission:view-role|admin']], function () {
        Route::resource('role', 'RoleController');
        Route::resource('assign-permission', 'AssignPermissionController');
    });
    
});

Route::get('/', function () {
    return view('site.index');
});

Route::get('/search/{id}/car','GuestController@searchCarByNumber');

Route::get('/dealer/{id}','GuestController@dealerPage');
Route::get('/dealer/{id}/profile','GuestController@dealerProfile');
Route::get('/dealer/car/{id}','GuestController@carDetails');
Route::post('/enquiry/car/{id}','GuestController@submitEnquiry');







