<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Enquiry extends Model
{
    //
    protected $fillable=['car_id','mobile','message','name'];

    public function car(){
        return $this->hasOne('App\Models\Car','id','car_id');
    }
}
