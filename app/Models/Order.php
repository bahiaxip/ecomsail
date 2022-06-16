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
        'status','order_type','ref','order_num','order_comment','location','selected_address','subtotal','total','payment_method','payment_info','user_id','paid_at' 
    ];
    
    protected $hidden = ['created_at','updated_at'];
    
    public function get_location(){
        return $this->belongsTo(Location::class,'location','id');
    }

    public function get_user(){
        return $this->belongsTo(User::class,'user_id','id');
    }
}
