<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class History_Order_Item extends Model
{
    use HasFactory;

    protected $dates = ['deleted_at'];
    protected $table = 'history_orders_items';
    protected $fillable = [
        'combinations','quantity','discount_status','end_discount','price_unit','total','title','path_tag','image','user_id','product_id','order_id','order_item_id'
    ];
    protected $hidden = ['created_at','updated_at'];

    public function feedback(){
        return $this->hasOne(Feedback_Product::class,'id','order_id');
    }
}
