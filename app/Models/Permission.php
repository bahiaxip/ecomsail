<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Permission extends Model
{
    use SoftDeletes;
    use HasFactory;

    protected $dates = ['deleted_at'];
    protected $table = 'permissions';

    protected $fillable = [
        'status','name','slug','description','box_permission_id'
    ];

    protected $hidden = ['created_at','updated_at'];

    public function role(){
        //return $this->belongsTo(Role::class,'')
    }
}
