<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Order extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $table = 'orders';

    protected $fillable = [
        'status','order_type','order_num','order_comment','delivery','selected_address','subtotal','total','payment_method','payment_info','user_id','paid_at' 
    ];
    
    protected $hidden = ['created_at','updated_at'];
    
}
