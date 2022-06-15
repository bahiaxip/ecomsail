<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $table = "addresses";
    protected $fillable = [
        'name','lastname','zone','location_id','province_id','city_id','address_home','apartment','cp','town','phone','email','business','nif','title','ref','user_id','default'
    ];

    protected $hidden = ['created_at','updated_at'];

    public function get_location(){
        return $this->belongsTo(Location::class,'location_id','id');
    }

    public function get_province(){
        return $this->belongsTo(Province::class,'province_id','id');
    }

    public function get_city(){
        return $this->belongsTo(City::class,'city_id','id');
    }
}
