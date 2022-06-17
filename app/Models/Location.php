<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Location extends Model
{
    use HasFactory;    

    protected $dates = ['deleted_at'];
    protected $table = 'locations';
    protected $fillable = [
        'name','status','zone','prefix_phone','coin','vat','path_tag','icon','icon_code','isocode_alpha2','isocode_num','price_default','default_delivery','type'
    ];

    protected $hidden = ['created_at','updated_at'];

    public function namezone(){
        return $this->belongsTo(Zone::class,'zone','id');
    }

    public function countCities(){
        return $this->hasMany(City::class,'location_id','id')->count();
    }
}
