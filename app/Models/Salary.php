<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Employee;
use App\Models\PaySalary;

class Salary extends Model
{

    protected $fillable=['name',
        'employee_id',
        'month',
        'year',
        'advance_salary',
    ];

    use HasFactory;

    public function employee(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Employee::class);
    }

    public function advanceSalary(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(PaySalary::class);
    }
}
