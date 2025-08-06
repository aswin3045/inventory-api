<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Warehouse extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'latitude', 'longitude'];

    // A warehouse can have many stock entries
    public function stocks()
    {
        return $this->hasMany(Stock::class);
    }
}
?>