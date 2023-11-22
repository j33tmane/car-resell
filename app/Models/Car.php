<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    //
    protected $fillable=['user_id','car_name','car_brand','year','color','fuel','transmission','km_driven','no_of_owners','car_description','car_number','price','active'];

    protected $appends = ['firstImageUrl'];
    public function dealerProfile(){
        return $this->hasOne('App\Models\DealerProfile','user_id','user_id');
    }

    public function images(){
        return $this->hasMany('App\Models\CarImage','car_id');
    }

    public function getFirstImageUrlAttribute(){
        $img = $this->hasMany('App\Models\CarImage','car_id')->first();
        if($img)
            return $img->imageUrl;
        else
            return url('/assets/images/car-place.png'); 
    }

    
}
