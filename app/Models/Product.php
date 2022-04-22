<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    use softDeletes;

    protected $dates = ['deleted_at'];
    protected $table = 'products';
    protected $fillable = [
        'name','status','slug','category_id','subcategory_id','state_discount','discount','init_date_discount','detail','path_root','path_tag','file_name','file_ext','image','thumb','code'

    ];
    protected $hidden = ['created_at','updated_at'];
}
