<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class City extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $table = 'cities';
    protected $fillable = [
        'name','status','type','path_tag','icon','icon_code','isocode_alfa2','isocode_num','location_id','province_id','municipality_id'
    ];
    protected $hidden = ['created_at','updated_at'];

    public function province(){
        return $this->belongsTo(Province::class,'province_id','province_id');
    }

    public function location(){
        return $this->belongsTo(Location::class,'location_id','id');
    }

    public function myzone(){
        return $this->belongsTo(Zone::class,'location_id','id');
    }
}
