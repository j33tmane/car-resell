<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\QueryBuilder\QueryBuilder;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Filesystem\FilesystemManager;
use Storage;
use Config;
class Car extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable=['visibility','video_key','is_sold','location','tyre_type','insurance','p_window','p_steering','yt_link','user_id','car_name','car_brand','year','color','fuel','transmission','km_driven','no_of_owners','car_description','car_number','price','active','features','bodystyle','power','engine'];

    protected $appends = ['firstImageUrl','video_id'];
    
    function getVideoUrlAttribute(){
        if ($this->video_key != null && filter_var($this->video_key, FILTER_VALIDATE_INT) == false)
            return Storage::disk('s3')->url($this->video_key);
    }

    public function dealerProfile(){
        return $this->hasOne('App\Models\DealerProfile','user_id','user_id');
    }

    public function images(){
        return $this->hasMany('App\Models\CarImage','car_id');
    }

    public function getPriceInrAttribute(){
        return preg_replace('/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i', "$1,", $this->price);
    }
    
    public function getBodyStyleNameAttribute(){
        if($this->bodystyle)
            return Config::get('drops.body-style')[$this->bodystyle];
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
            if(!array_key_exists('query',$parts))
                return 'Invalid';
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

    public function scopePriceBetween(Builder $query, $plist): Builder
    {
        $prices = explode(';',$plist);
        return $query->where('price', '>=', $prices[0])->where('price','<=',$prices[1]);
    }

    
    
}
