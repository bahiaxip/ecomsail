<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
    use HasFactory;

    protected $table='visitors';
    protected $fillable = [
        'ip_address','page','referer','time','user_agent','port','method'
    ];
    protected $hidden = ['created_at','updated_at'];
}
