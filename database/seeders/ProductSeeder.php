<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
public function run()
{
    Product::insert([
        ['name' => 'Product A', 'base_price' => 100],
        ['name' => 'Product B', 'base_price' => 200],
        ['name' => 'Product C', 'base_price' => 300],
    ]);
}
}
