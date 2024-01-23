<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ImagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('images')->insert(
            [
                [
                    'image_path' => 'oranges.jpg',
                    'product_id' => '1'
                ],
                [
                    'image_path' => 'strawberries.jpg',
                    'product_id' => '2'
                ],
                [
                    'image_path' => 'parsley.jpg',
                    'product_id' => '3'
                ],
                [
                    'image_path' => 'Broccoli.jpg',
                    'product_id' => '4'
                ],
                [
                    'image_path' => 'Chicken-Curry-Cut.jpg',
                    'product_id' => '5'
                ],
                [
                    'image_path' => 'croissant-bread.jpg',
                    'product_id' => '6'
                ],
                [
                    'image_path' => 'baner-1.png',
                    'product_id' => '7'
                ],
            ]
        );
    }
}
