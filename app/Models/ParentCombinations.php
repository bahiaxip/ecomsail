<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParentCombinations extends Model
{
    use HasFactory;

    protected $table = 'parent_combinations';
    protected $fillable = [
        'parent_id','parent_name','type_selection','product_id'
    ];
    protected $hidden = ['created_at','updated_at'];
}
