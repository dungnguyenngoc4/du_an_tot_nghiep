<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attribute_value extends Model
{
    use HasFactory;
    protected $fillable = [
        'value',
        'attribute_id',
        'created_at',
        'updated_at'
    ];
    public function attribute()
    {
        return $this->belongsTo(Attribute::class);
    }
    public function product_attribute()
    {
        return $this->hasMany(Product_variant_attribute_value::class);
    }
}
