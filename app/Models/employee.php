<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class employee extends Model
{
    use HasFactory;
    protected $table ='employees';
    protected $fillable=[
       'name',
       'email',
       'phone',
       'address',
       'experience',
       'nid_number',
       'photo',
       'salary',
       'vacation',
       'city',
    ];
    public function advance() {
        return $this->belongsTo(Advance_salary::class,'id','emp_id');
    }
    public function paid_all_salary() {
        return $this->belongsTo(Salary::class,'id','emp_id');
    }
}
