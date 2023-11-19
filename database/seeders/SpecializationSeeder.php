<?php

namespace Database\Seeders;

use App\Models\specialization;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SpecializationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $spec =[
            ['name' => "Cardiology"],
            ["name" => "Neurology"],
            ["name" => "Psychology"],
            ["name" => "Endocrinology"],
        ];
        specialization::insert($spec);
    }
}
