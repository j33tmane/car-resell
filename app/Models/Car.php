<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    //
    protected $fillable=['user_id','car_name','car_brand','year','fuel','transmission','km_driven','no_of_owners','car_description','car_number','price','active'];

    public function dealerProfile(){
        return $this->hasOne('App\Models\DealerProfile','user_id','user_id');
    }

}
