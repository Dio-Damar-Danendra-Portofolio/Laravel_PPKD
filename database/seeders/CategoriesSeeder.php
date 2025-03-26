<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Categories;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Categories::insert([
            ['category_name'=> 'Makanan Ringan'],
            ['category_name'=> 'Makanan Berat'],
            ['category_name'=> 'Makanan Penutup'],
            ['category_name'=> 'Minuman'],
            ['category_name'=> 'Non Alkohol'],
        ]);
    }
}
