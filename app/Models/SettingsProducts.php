<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class SettingsProducts extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $dates = ['deleted_at'];
    protected $table = 'settings_products';

    protected $fillable = [
        'availability','product_state','not_minstock','email_minstock','minstock','delivery_time','custom_delivery','amount_delivery','long','width','height','weight','path_root','path_tag','file_name','file_ext','attachment_file','thumb','product_id'
    ];
    protected $hidden = ['created_at','updated_at'];
}
