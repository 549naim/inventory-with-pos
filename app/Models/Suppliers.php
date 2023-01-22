<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Suppliers extends Model
{
    use HasFactory;
    protected $table ='suppliers';
    protected $fillable=[
        'name',
        'email',
        'phone',
        'address',
        'shop_name',
        'type',
        'nid_number',
        'photo',
        'bank_holder_name',
        'bank_account_number',
        'bank_name',
        'bank_branch_name',
        'city',
     ];
}
