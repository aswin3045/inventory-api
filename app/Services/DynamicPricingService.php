<?php

namespace App\Services;

use App\Models\Product;

class DynamicPricingService
{
    public function getPrice(Product $product)
    {
        $totalQuantity = $product->stocks()->sum('quantity');

        $price = $product->base_price;

        if ($totalQuantity < 10) {
            $price *= 1.30;
        } elseif ($totalQuantity >= 10 && $totalQuantity <= 50) {
            $price *= 1.10;
        } elseif ($totalQuantity > 100) {
            $price *= 0.80;
        }

        // Stock expiring in next 7 days
        $nearExpiryStock = $product->stocks()
            ->where('expires_at', '<=', now()->addDays(7))
            ->sum('quantity');

        if ($nearExpiryStock > 0) {
            $price *= 0.75;
        }

        return round($price, 2);
    }
}
