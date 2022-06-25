<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
class Favorite extends Model
{
    use HasFactory;

    protected $table = 'favorites';
    protected $fillable = [
        'user_id','product_id'
    ];
    protected $hidden = ['created_at','updated_at'];

    public function get_product(){
        return $this->belongsTo(Product::class,'product_id');
    }
}
