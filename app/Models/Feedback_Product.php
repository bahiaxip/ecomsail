<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
class Feedback_Product extends Model
{
    use HasFactory;

    protected $table = 'feedback_products';
    protected $fillable = [
        'status','title','feedback','description','order_id','product_id','user_id','order_item_id'
    ];

    protected $hidden = ['created_at','updated_at'];

    public function product(){
        return $this->belongsTo(Product::class,'product_id');
    }
}
