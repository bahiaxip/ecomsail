<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
class Combination extends Model
{
    use HasFactory;

    protected $table = 'combinations';
    protected $fillable = [
        'name','list_ids','amount','product_id','added_price','final_price','type_selection','checked'
    ];

    protected $hidden = ['created_at','updated_at'];

    public function product(){
        return $this->belongsTo(Product::class,'product_id','id');
    }
}
