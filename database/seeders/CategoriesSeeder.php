<?php

namespace Database\Seeders;

use App\Models\Categories;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Categories::create([
            "user_id" => 1,
            "name" => "Electronics"
            
        ]);

        Categories::create([
            "user_id" => 1,
            "name" => "Clothes"
        ]);
    }
}
