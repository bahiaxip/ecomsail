<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_Item extends Model
{
    use HasFactory;

    protected $table = 'orders_items';
    protected $fillable = [
        'combinations','combinations_text','quantity','state_discount','discount','end_discount','added_price','price_unit','total','title','path_tag','image','user_id','product_id','order_id'
    ];
    protected $hidden = ['created_at','updated_at'];

    public function product(){
        return $this->belongsTo(Product::class,'product_id','id');
    }
}
