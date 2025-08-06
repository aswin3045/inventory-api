<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Stock extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['product_id', 'warehouse_id', 'quantity', 'expires_at'];

    // Each stock belongs to one product
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    // Each stock belongs to one warehouse
    public function warehouse()
    {
        return $this->belongsTo(Warehouse::class);
    }
}
?>
