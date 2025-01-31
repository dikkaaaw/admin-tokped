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
                'stock' => 5,
                'category' => 'Buah',
                'image' => 'melon-hijau.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Melon Orange',
                'price' => 25000,
                'stock' => 5,
                'category' => 'Buah',
                'image' => 'melon-orange.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Semangka Merah',
                'price' => 25000,
                'stock' => 5,
                'category' => 'Buah',
                'image' => 'semangka-merah.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Semangka Kuning',
                'price' => 25000,
                'stock' => 5,
                'category' => 'Buah',
                'image' => 'semangka-kuning.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Strawberry',
                'price' => 25000,
                'stock' => 5,
                'category' => 'Buah',
                'image' => 'stroberi.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Paprika',
                'price' => 25000,
                'stock' => 5,
                'category' => 'Buah',
                'image' => 'paprika.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('products')->insert($products);
    }
}
