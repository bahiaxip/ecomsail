<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Attribute extends Model
{
    use HasFactory;
    use softDeletes;
    protected $dates = ['deleted_at'];
    protected $table = 'attributes';
    protected $fillable = [
        'status','type','name','slug','description'
    ];
    protected $hidden = ['created_at','updated_at'];
    //obtener la cantidad de valores que contiene una atributo
    public function valueslength(){
        return $this->hasMany(Attribute::class,'type','id')->count();
    }

    public function parentattr(){
        return $this->belongsTo(Attribute::class,'type','id');
    }

}
