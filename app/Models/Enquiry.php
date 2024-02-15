<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Enquiry extends Model
{
    //
    protected $fillable=['car_id','mobile','message','name','offer'];

    public function car(){
        return $this->hasOne('App\Models\Car','id','car_id');
    }

    public function getOfferInrAttribute(){
        if($this->offer)
        return preg_replace('/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i', "$1,", $this->offer);
    }
}
