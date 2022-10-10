<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Notification extends Model
{
    use HasFactory, SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $table  = 'notifications';
    protected $fillable = [
        'status','title','description','type','user_id'
    ];

    protected $hidden = ['created_at','updated_at'];
}
