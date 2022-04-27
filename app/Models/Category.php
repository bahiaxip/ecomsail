<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;
class Category extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $table = 'categories';

    protected $fillable = ['name','type','status','slug','description','image','file_name','thumb','file_ext','path_root','path_tag'];
    protected $hidden = ['created_at','updated_at'];
}
