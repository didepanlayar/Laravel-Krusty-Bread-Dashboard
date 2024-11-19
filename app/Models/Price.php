<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'sales_type_id',
        'price'
    ];


    public function salesType()
    {
        return $this->belongsTo(SalesType::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
