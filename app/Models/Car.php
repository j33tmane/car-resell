<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    //
    protected $fillable=['location','tyre_type','insurance','p_window','p_steering','yt_link','user_id','car_name','car_brand','year','color','fuel','transmission','km_driven','no_of_owners','car_description','car_number','price','active'];

    protected $appends = ['firstImageUrl','video_id'];
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

    public function getVideoIdAttribute(){
        if(!$this->yt_link)
            return null;
        else{
            $parts = parse_url($this->yt_link);
            if($parts['host']=="youtu.be"){
                $video_id= str_replace('/', '', $parts['path']);
            }
            else if($parts['query']){
                parse_str($parts['query'], $query);
                $video_id=$query['v'];
            }
            return $video_id;
        }
        
    }

    
    
}
