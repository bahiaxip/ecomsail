<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
class Combination extends Model
{
    use HasFactory;

    protected $table = 'combinations';
    //el parentattr se ha añadido debido a la modificación
    //restringiendo las combinaciones a un solo atributo>valor por combinación
    protected $fillable = [
        'name','list_ids','parent_attr','amount','product_id','stock','added_price','final_price','checked'
    ];

    protected $hidden = ['created_at','updated_at'];

    public function product(){
        return $this->belongsTo(Product::class,'product_id','id');
    }
}
