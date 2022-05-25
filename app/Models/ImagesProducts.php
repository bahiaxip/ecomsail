<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImagesProducts extends Model
{
    use HasFactory;

    protected $table = 'images_products';
    protected $fillable = [
        'path_root','path_tag','file_name','file_ext','image','thumb','description','product_id'
    ];
    protected $hidden = ['created_at','updated_at'];
}
