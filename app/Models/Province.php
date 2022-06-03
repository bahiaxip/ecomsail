<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    use HasFactory;

    protected $table = 'provinces';
    protected $fillable = [
        'name','status','type','path_tag','icon','icon_code','isocode_alfa2','isocode_num','location_id','province_id'
    ];
    protected $hidden = ['created_at','updated_at'];
}
