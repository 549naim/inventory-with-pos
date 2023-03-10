<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table ='orders';
    protected $fillable=[
        'customer_id',
        'order_date',
        'order_status',
        'total_product',      
        'subtotal',      
        'vat',      
        'total',      
        'payment_status',      
        'pay',      
        'due',      
     ];
     public function cus() {
        return $this->belongsTo(Customer::class,'customer_id','id');
    }

    
}
