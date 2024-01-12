<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert(
            [
            [
                'name' => 'Vegetables',
                'images' => 'vegetables.jpg',
            ],
            [
                'name' => 'Bread',
                'images' => 'breads.jpg'
            ],
            [
                'name' => 'Fruits',
                'images' => 'fruits.png'
            ],
            [
                'name' => 'Meat',
                'images' => 'meat.jpg'
            ]
            ]
        );
    }
}
