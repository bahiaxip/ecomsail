<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//se puede descomentar el softDeletes() pero solo funciona en 
//productos, necesario añadir la columna softDeletes en settings_products y infoprice_products para ver si también 
//hace el softDeletes() en cascada

use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Product,App\Models\Category,App\Models\SettingsProducts,App\Models\InfopriceProducts;
class Product extends Model
{
    use HasFactory;
    use softDeletes;

    protected $dates = ['deleted_at'];
    protected $table = 'products';
    protected $fillable = [
        'name','status','slug','category_id','subcategory_id','state_discount','discount','init_date_discount','short_detail','detail','path_root','path_tag','file_name','file_ext','image','thumb','code','stock','price'

    ];
    protected $hidden = ['created_at','updated_at'];

    public function cat(){
        return $this->belongsTo(Category::class,'category_id','id');
    }

    public function settings(){
        return $this->hasOne(SettingsProducts::class,'product_id','id');
    }

    public function infoprice(){
        return $this->hasOne(InfopriceProducts::class,'product_id','id');
    }

    
    //método para eliminar mediante softDeletes() las 2 tablas relacionadas
    public static function boot ()
    {
        parent::boot();

        self::deleting(function (Product $product) {

            //para relaciones de uno
            $product->settings()->delete();
            $product->infoprice()->delete();

            //para relaciones con muchos
            /*
            foreach ($product->settings as $settings)
            {
                $settings->delete();
            }
            */

        });
        self::restoring(function (Product $product) {

            //para relaciones de uno
            $product->settings()->restore();
            $product->infoprice()->restore();

            //para relaciones con muchos
            /*
            foreach ($product->settings as $settings)
            {
                $settings->delete();
            }
            */

        });

    }
    


}
