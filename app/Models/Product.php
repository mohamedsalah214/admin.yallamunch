<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
        'discount_price',
        'image',
        'slug',
        'category_id'
    ];

    public $translatable = ['name', 'description'];

    protected $casts = [
        'name'          => 'array',
        'description'   => 'array',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function weights()
    {
        return $this->hasMany(ProductWeight::class);
    }
}
