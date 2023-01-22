<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Advance_salary extends Model
{
    use HasFactory;
    protected $table ='advance_salaries';
    protected $fillable=[
        'emp_id',
        'month',
        'advance_salary',
        'year',
        
     ];
     public function emp() {
        return $this->belongsTo(Employee::class,'emp_id','id');
    }
}
