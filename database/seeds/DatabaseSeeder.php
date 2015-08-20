<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        $this->call(LocationCountrySeeder::class);
        $this->call(LocationStateSeeder::class);
        $this->call(LocationCitySeeder::class);
        $this->call(UserSeeder::class);
        $this->call(TagSeeder::class);
    }
}
