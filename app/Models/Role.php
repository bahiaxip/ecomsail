<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Role extends Model
{
    use SoftDeletes;
    use HasFactory;

    protected $dates = ['deleted_at'];
    protected $table = 'roles';

    protected $fillable = ['name','slug','description','status'];
    protected $hidden =['created_at','updated_at'];

    /*
    public function permissions(){
        return $this->hasMany(Permission::class,'id','permission_id');
    }
    */
}
