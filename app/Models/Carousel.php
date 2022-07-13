<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carousel extends Model
{
    use HasFactory;

    protected $table = 'carousels';
    protected $fillable = [
        'status','title','text','path_root','path_tag','file_name','file_ext','image','thumb','position','user_id'
    ];
    protected $hidden = ['created_at','updated_at'];
}
