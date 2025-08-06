<?php
namespace App\Http\Controllers;

use App\Models\Warehouse;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class WarehouseController extends Controller
{
    public function report($id)
    {
        $warehouse = Warehouse::with(['stocks.product'])->findOrFail($id);

        $report = [];

        foreach ($warehouse->stocks as $stock) {
            $productId = $stock->product->id;

            if (!isset($report[$productId])) {
                $report[$productId] = [
                    'product_id' => $productId,
                    'product_name' => $stock->product->name,
                    'total_quantity' => 0,
                    'near_expiry' => false
                ];
            }

            // Add quantity
            $report[$productId]['total_quantity'] += $stock->quantity;

            // Check for near-expiry (within next 7 days)
            if (Carbon::parse($stock->expires_at)->lte(now()->addDays(7))) {
                $report[$productId]['near_expiry'] = true;
            }
        }

        return response()->json(array_values($report));
    }
}
?>