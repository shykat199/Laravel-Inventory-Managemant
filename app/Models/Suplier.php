<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Suplier extends Model
{
    use HasFactory;
    protected $fillable=['name',
        'email',
        'phone',
        'address',
        'shop',
        'photo',
        'account',
        'city',
        'type'
    ];

    public function product(){
        return $this->belongsToMany(Product::class);
    }
}
