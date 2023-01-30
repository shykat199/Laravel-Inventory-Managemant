<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable=['name',
        'category_id',
        'suplier_id',
        'product_code',
        'product_warehouse',
        'product_route',
        'product_image',
        'buy_date',
        'expire_date',
        'buying_price',
        'selling_price',
        ];
    use HasFactory;

    public function category(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Category::class);
    }

    public function supplier(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Suplier::class);
    }
}
