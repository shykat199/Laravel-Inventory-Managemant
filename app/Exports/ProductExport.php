<?php

namespace App\Exports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Facades\Excel;

class ProductExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection(): \Illuminate\Support\Collection
    {
        return Product::all(
            'name',
            'category_id',
            'suplier_id',
            'product_code',
            'product_warehouse',
            'product_route',
            'product_image',
            'buy_date',
            'expire_date',
            'buying_price',
            'selling_price');
    }
}
