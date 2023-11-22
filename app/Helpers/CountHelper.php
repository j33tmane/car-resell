<?php

namespace App\Helpers;
use Illuminate\Support\Facades\Http;
use App\User;
use App\Models\Enquiry;
use App\Models\Car;
use App\Models\DealerProfile;
use Carbon\Carbon;
use DB;
class CountHelper
{
    public static function getTotalEnquiry($user){
        if($user->hasRole('admin'))
            return Enquiry::all()->count();
        else
            return Enquiry::leftjoin('cars','cars.id','=','car_id')->where('cars.user_id',$user->id)->count();
    }

    public static function getTotalCars($user){
        if($user->hasRole('admin'))
            return Car::all()->count();
        else
            return Car::where('user_id',$user->id)->count();
    }

    public static function getTotalDealers($user){
        if($user->hasRole('admin'))
            return DealerProfile::all()->count();
        else
            return 0;
    }


}