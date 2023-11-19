<?php

namespace Database\Seeders;

use App\Models\category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category =[
            ['name' => "Cardiology"],
            ["name" => "Neurology"],
            ["name" => "Psychology"],
            ["name" => "Endocrinology"],
        ];
        category::insert($category);
    }
}
