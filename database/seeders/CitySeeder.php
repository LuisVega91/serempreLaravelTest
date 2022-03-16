<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cities')->insert([
           [
               "id" => 1,
               "cod" => "1",
               "name" => "cartagena",
           ],
            [
                "id" => 2,
               "cod" => "2",
               "name" => "barranquilla",
           ],[
                "id" => 3,
               "cod" => "3",
               "name" => "santamarta",
           ],
        ]);
    }
}
