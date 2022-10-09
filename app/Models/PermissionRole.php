<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PermissionRole extends Model
{
    use HasFactory;

    protected $table = 'permission_role';
    protected $fillable = [
        'permission_id','role_id'
    ];
    protected $hidden = ['created_at','updated_at'];

    public function permissions(){
        //return $this->hasOne(Permissions:class,'id','permissionid');
    }
    
}
