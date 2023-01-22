<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $fillable =[
        'product_name',
        'cate_id',
        'supplier_id',
        'product_code',
        'product_quantity',
        'product_warehouse',
        'product_route',
        'product_image',
        'buy_date',
        'expire_date',
        'buying_price',
        'selling_price',
    ];
    public function cate() {
        return $this->belongsTo(Category::class,'cate_id','id');
    }
}
