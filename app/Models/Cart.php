<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected static $unguarded = true;

    /**
     * Get the user that owns the cart.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the details for this cart.
     */
    public function details()
    {
        return $this->hasMany(CartDetail::class);
    }

    /**
     * Get the total amount for this cart.
     */
    public function getTotalAttribute()
    {
        return $this->details->sum('subtotal');
    }

    /**
     * Add a product to the cart.
     */
    public function addProduct(Product $product, $quantity = 1)
    {
        $detail = $this->details()->where('product_id', $product->id)->first();

        if ($detail) {
            $detail->increment('quantity', $quantity);
        } else {
            $this->details()->create([
                'product_id' => $product->id,
                'quantity' => $quantity,
                'price' => $product->price
            ]);
        }
    }

    /**
     * Remove all items from the cart.
     */
    public function clear()
    {
        $this->details()->delete();
    }
}
