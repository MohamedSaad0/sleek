<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert([
        [
            'name' => 'Oranges',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Officiis, in?',
            'price' => '9.99',
            'subcategory' => 'Fresh Organic Vegetables'
        ],
        [
            'name' => 'Strawberies',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Officiis, in?',
            'price' => '14.99',
            'subcategory' => 'Fresh Organic Vegetables'
        ],
        [
            'name' => 'Parsley',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Officiis, in?',
            'price' => '4.99',
            'subcategory' => 'Fresh Organic Vegetables'
        ],
        [
            'name' => 'Broccoli',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Officiis, in?',
            'price' => '14.99',
            'subcategory' => 'Exotic Vegetables'
        ],
        [
            'name' => 'Chicken-Curry-Cut-min',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Officiis, in?',
            'price' => '29.99',
            'subcategory' => 'Tasty'
        ],
        [
            'name' => 'croissant-bread',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Officiis, in?',
            'price' => '9.99',
            'subcategory' => 'Tasty'
        ]
        ]);
    }
}
