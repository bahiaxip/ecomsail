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
    protected $table = 'productts';
    protected $fillable = [

    ];
    protected $hidden = ['created_at','updated_at'];
}
