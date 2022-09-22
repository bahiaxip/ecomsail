<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class History_Address extends Model
{
    use HasFactory;

    protected $table= 'history_addresses';
    protected $fillable = [
        'name','lastname','zone','location_id','province_id','city_id','address_home','apartment','cp','town','phone','email','business','nif','title','ref','user_id','default'
    ];

    protected $hidden =['created_at','updated_at'];
}
