<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategoryProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('category_products')->insert(
            [
                [
                    'category_id' => '3',
                    'product_id' => '2',
                ],
                [
                    'category_id' => '1',
                    'product_id' => '3',
                ],
                [
                    'category_id' => '4',
                    'product_id' => '4',
                ],
                [
                    'category_id' => '1',
                    'product_id' => '5',
                ],
                [
                    'category_id' => '2',
                    'product_id' => '6',
                ],
                [
                    'category_id' => '3',
                    'product_id' => '1',
                ]
            ]
                );
    }
}
