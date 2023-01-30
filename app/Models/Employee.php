<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{

    protected $fillable=[
        'name',
        'email',
        'phone',
        'address',
        'experience',
        'photo',
        'salary',
        'vacation',
        'city',
    ];
    use HasFactory;

    public function salary(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Salary::class);
    }

    public function paySalary(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(PaySalary::class);
    }

    public function attendance(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Attendence::class,'employee_id','id');
    }
}
