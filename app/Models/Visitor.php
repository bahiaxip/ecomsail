<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
    use HasFactory;

    protected $table='visitors';
    protected $fillable = [
        'ipaddress','page','referrer','time','user_agent'
    ];
    protected $hidden = ['created_at','updated_at'];
}
