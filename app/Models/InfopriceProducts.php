<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class InfopriceProducts extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $dates = ['deleted_at'];
    protected $table = 'infoprice_products';
    protected $fillable = [
        'type_tax','tax','partial_price','discount_type','discount','init_discount','end_discount','product_id'
    ];

    protected $hidden = ['created_at','updated_at'];
}
