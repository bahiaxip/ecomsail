<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Product;
use Illuminate\Database\Eloquent\SoftDeletes;
class Category extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $table = 'categories';

    protected $fillable = ['name','type','status','slug','description','image','file_name','thumb','file_ext','path_root','path_tag','offer','title_offer','icon_awesome_offer','icon_image_offer','icon_image_offer_hover','icon_hexcode'];
    protected $hidden = ['created_at','updated_at'];

    public function prod(){
        return $this->hasMany(Product::class,'category_id','id');
    }
    public function prod_from_subcat(){
        return $this->hasMany(Product::class,'subcategory_id','id');    
    }
    //mediante array (@foreach...@endforeach) se puede obtener los datos de la 
    //subcategoría
    public function subcat(){
        return $this->hasMany(Category::class,'type','id');
    }
    //obtener el número de subcategorías que contiene una categoría
    public function subcatlength(){
        return $this->hasMany(Category::class,'type','id')->count();
    }
    //obtener la categoría padre de una subcategoría
    public function parentcat(){
        return $this->belongsTo(Category::class,'type','id');
    }

    public static function boot (){
        parent::boot();
        self::deleting(function (Category $category){
            //elimina todos los productos
            $category->prod()->delete();
        });

        self::restoring(function (Category $category) {
            //no se deben restarurar, ya que podría restaurar
            //productos que no han sido eliminados en la eliminación 
            //de la categoría
            //$category->prod()->restore();
        });

    //self::deleting(function (Product $product) {

            //para relaciones de uno
    //$product->settings()->delete();
    //$product->infoprice()->delete();

            //para relaciones con muchos
            /*
            foreach ($product->settings as $settings)
            {
                $settings->delete();
            }
            */
    //}
    }

}
