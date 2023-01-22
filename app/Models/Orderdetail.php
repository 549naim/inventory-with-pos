<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orderdetail extends Model
{
    use HasFactory;
    protected $table ='orderdetails';
    protected $fillable=[
        'order_id',
        'product_id',
        'qty',
        'unitcost',      
        'total',      
     ];
     public function order() {
        return $this->belongsTo(Order::class,'order_id','id');
    }

     public function prod() {
        return $this->belongsTo(Product::class,'product_id','id');
    }
}
