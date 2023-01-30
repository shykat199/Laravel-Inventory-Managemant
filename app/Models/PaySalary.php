<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Salary;
use App\Models\Employee;

class PaySalary extends Model
{
    use HasFactory;
    protected $fillable=['employee_id','salary_month','paid_mount','status'];

    public function salary(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Salary::class);
    }
    public function employee(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Employee::class);
    }
}
