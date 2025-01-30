<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'name' => 'Melon Hijau',
                'price' => 30000,
                'quantity' => 5,
                'category' => 'Buah',
                'image' => '',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Melon Orange',
                'price' => 25000,
                'quantity' => 5,
                'category' => 'Buah',
                'image' => '',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Semangka Merah',
                'price' => 25000,
                'quantity' => 5,
                'category' => 'Buah',
                'image' => '',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Semangka Kuning',
                'price' => 25000,
                'quantity' => 5,
                'category' => 'Buah',
                'image' => '',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('products')->insert($products);
    }
}
