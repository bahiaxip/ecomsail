<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Location extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $table = 'locations';
    protected $fillable = [
        'name','status','zone','path_tag','icon','icon_code','isocode_alfa2','isocode_num','price_default','type'
    ];

    protected $hidden = ['created_at','updated_at'];

    public function namezone(){
        return $this->belongsTo(Zone::class,'zone','id');
    }
}
