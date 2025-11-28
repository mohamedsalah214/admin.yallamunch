<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id',
        'firstname',
        'lastname',
        'phone',
        'email',
        'city_id',
        'area_id',
        'street',
        'property_type',
        'building',
        'floor',
        'apartment',
        'order_number',
        'status',
        'payment_status',
        'payment_method',
        'total_amount',
        'shipping_address',
        'notes',
    ];

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
