<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Filesystem\FilesystemManager;
use Storage;

class CarImage extends Model
{
    //
    protected $fillable=['car_id','image_key'];
    protected $appends = ['imageUrl'];

    function getImageUrlAttribute(){
        if ($this->image_key != null && filter_var($this->image_key, FILTER_VALIDATE_INT) == false)
            return Storage::disk('s3')->url($this->image_key);
        else
        return url('/assets/images/logo-place.png');
    }
}
