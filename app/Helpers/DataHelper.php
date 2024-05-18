<?php

namespace App\Helpers;
use Illuminate\Support\Facades\Http;
use App\User;
use App\Models\Enquiry;
use App\Models\Car;
use App\Models\DealerProfile;
use Carbon\Carbon;
use DB;
class DataHelper
{
    public static function getDealerBrand($id){
       return  Car::select('car_brand')->where('user_id',$id)->distinct()->pluck('car_brand');
    }

    public static function getDealerYears($id){
        return  Car::select('year')->where('user_id',$id)->distinct()->pluck('year');
     }

     public static function getDealerFuels($id){
        return  Car::select('fuel')->where('user_id',$id)->distinct()->pluck('fuel');
     }

     //car object with all information
     public static function getRelatedCars($car){
      return  Car::select('*')->where('bodystyle','=',$car->bodystyle)->where('bodystyle','!=',null)->where('is_sold','!=',1)->where('user_id','=',$car->user_id)->where('id','!=',$car->id)->get();
   }

}