<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
// use Laravolt\Indonesia\Seeds\CitiesSeeder;
// use Laravolt\Indonesia\Seeds\VillagesSeeder;
// use Laravolt\Indonesia\Seeds\DistrictsSeeder;
// use Laravolt\Indonesia\Seeds\ProvincesSeeder;

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
            UserSeeder::class
        ]);
    }
}
