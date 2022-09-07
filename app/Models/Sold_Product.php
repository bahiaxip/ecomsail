<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sold_Product extends Model
{
    use HasFactory;

    protected $table = 'sold_products';
    protected $fillable = [
        'sold_nums','product_id'
    ];
    protected $hidden = ['created_at','updated_at'];

    public function product(){
        return $this->belongsTo(Product::class,'product_id');
    }
}
