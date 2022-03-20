<?php

namespace Database\Seeders;

use App\Models\Client;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            CitySeeder::class,
            UsersTableSeeder::class,
            VoyagerCitiesBreadSeeder::class,
            VoyagerClientsBreadSeeder::class,
        ]);
        User::factory(10)->create();
        Client::factory(200)->create();

    }
}
