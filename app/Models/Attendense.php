<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendense extends Model
{
    use HasFactory;
    protected $table ='attendenses';
    protected $fillable=[
        'user_id',
        'att_date',
        'attendense',
       
     ];
     public function emp() {
        return $this->belongsTo(Employee::class,'user_id','id');
    }
}