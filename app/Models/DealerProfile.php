<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Filesystem\FilesystemManager;
use Storage;
class DealerProfile extends Model
{
    //
    protected $fillable=['description','profile_img','sold_cars','total_cars','image_key','user_id','company_name','contact_person_name','url_slug','address','contact_call','contact_whatsapp','social_link'];

    protected $appends = ['imageUrl','social','banner'];

    public function cars(){
        return $this->hasMany('App\Models\Car','user_id','user_id');
    }

    function getImageUrlAttribute(){
        if ($this->image_key != null && filter_var($this->image_key, FILTER_VALIDATE_INT) == false)
            return Storage::disk('s3')->url($this->image_key);
        else
        return url('/assets/images/logo-place.png');
    }

    function getSocialAttribute(){
      if($this->social_link)
        return json_decode($this->social_link);
    }

    public function getBannerAttribute(){
        if ($this->profile_img != null && filter_var($this->profile_img, FILTER_VALIDATE_INT) == false)
            return Storage::disk('s3')->url($this->profile_img);
        else
            return url('/assets/images/dbanner.jpg'); 
    }
}
