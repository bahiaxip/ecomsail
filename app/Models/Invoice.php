<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Invoice extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $table = 'invoices';
    protected $fillable = [
        'status','net','vat','total','order_buy','office_guide','order_id'
    ];
    protected $hidden = ['created_at','updated_at'];

    public function get_order(){
        return $this->belongsTo(Order::class,'order_id','id');
    }
}
