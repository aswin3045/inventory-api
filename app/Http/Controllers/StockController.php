<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreStockRequest;
use App\Models\Stock;

class StockController extends Controller
{

    public function store(StoreStockRequest $request)
    {
        $data = $request->validated();

        // Check if stock exists for this product + warehouse
        $stock = Stock::where('product_id', $data['product_id'])
            ->where('warehouse_id', $data['warehouse_id'])
            ->whereDate('expires_at', $data['expires_at'])
            ->first();

        if ($stock) {
            // Update quantity
            $stock->quantity += $data['quantity'];
            $stock->save();
        } else {
            // Create new stock
            $stock = Stock::create($data);
        }

        return response()->json([
            'message' => 'Stock saved successfully.',
            'stock' => $stock
        ], 201);
    }
}


