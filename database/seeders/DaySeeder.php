<?php

namespace Database\Seeders;

use App\Models\day;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $days = [
            ["name" => "Sunday" , "sub_name" => "Sun"],
            ["name" => "Monday", "sub_name" => "Mon"],
            ["name" => "Tuesday", "sub_name" => "Tue"],
            ["name" => "Wednesday", "sub_name" => "Wed"],
            ["name" => "Thursday", "sub_name" => "Thu"],
            ["name" => "Friday", "sub_name" => "Fri"],
            ["name" => "Saturday", "sub_name" => "Sat"],
        ];

        day::insert($days);
    }
}
