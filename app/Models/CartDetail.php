<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CartDetail extends Model
{
    protected static $unguarded = true;

    /**
     * Get the cart that owns this detail.
     */
    public function cart()
    {
        return $this->belongsTo(Cart::class);
    }

    /**
     * Get the product for this detail.
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * Get the subtotal for this detail.
     */
    public function getSubtotalAttribute()
    {
        return $this->quantity * $this->price;
    }
}
