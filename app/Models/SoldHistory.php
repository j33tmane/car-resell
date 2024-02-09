<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SoldHistory extends Model
{
    protected $fillable = ['car_id','customer_name','customer_address','customer_mobile','sell_price'];

    public function car()
    {
        return $this->belongsTo('App\Models\Car','car_id');
    }
}
