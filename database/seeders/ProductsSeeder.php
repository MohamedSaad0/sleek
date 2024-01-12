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
            'price' => '9.99'
        ],
        [
            'name' => 'Strawberies',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Officiis, in?',
            'price' => '14.99'
        ],
        [
            'name' => 'Parsley',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Officiis, in?',
            'price' => '4.99'
        ],
        [
            'name' => 'Broccoli',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Officiis, in?',
            'price' => '14.99'
        ],
        [
            'name' => 'Chicken-Curry-Cut-min',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Officiis, in?',
            'price' => '29.99'
        ],
        [
            'name' => 'croissant-bread',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Officiis, in?',
            'price' => '9.99'
        ]
        ]);
    }
}
