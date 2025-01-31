<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Import_history extends Model
{
    use HasFactory;
    protected $fillable = [
        'quantity',
        'import_price',
        'product_variant_id',
        'created_at',
        'updated_at'
    ];
    public function product_variant()
    {
        return $this->belongsTo(Product_variant::class);
    }
}
