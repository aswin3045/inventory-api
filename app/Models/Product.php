<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'base_price'];

    // A product can have many stock entries
    public function stocks()
    {
        return $this->hasMany(Stock::class);
    }
}
?>
