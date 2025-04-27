<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected static $unguarded = true;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function details()
    {
        return $this->hasMany(OrderDetail::class);
    }

    public function getStatusColorAttribute()
    {
        return match($this->order_status) {
            'PENDING' => 'yellow',
            'PROCESSING' => 'blue', 
            'COMPLETED' => 'green',
            'CANCELLED' => 'red',
            default => 'gray'
        };
    }

    public function getPaymentStatusColorAttribute() 
    {
        return match($this->payment_status) {
            'PENDING' => 'yellow',
            'PAID' => 'green',
            'FAILED' => 'red',
            'REFUNDED' => 'blue',
            default => 'gray'
        };
    }

    public function getShippingStatusColorAttribute()
    {
        return match($this->shipping_status) {
            'PENDING' => 'yellow',
            'PROCESSING' => 'blue',
            'SHIPPED' => 'green', 
            'DELIVERED' => 'green',
            'RETURNED' => 'red',
            default => 'gray'
        };
    }
}
