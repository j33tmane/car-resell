<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DealerProfile extends Model
{
    //
    protected $fillable=['user_id','company_name','contact_person_name','url_slug','address','contact_call','contact_whatsapp','social_link'];
}
