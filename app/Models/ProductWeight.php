<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductWeight extends Model
{
    use HasFactory;

    protected $fillable = ['product_id', 'label', 'price'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
