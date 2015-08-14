<?php 

use Illuminate\Database\Seeder;

class LocationCountrySeeder extends Seeder {

	/**
     * Run the database seeds.
     *
     * @return void
     */
    public function run ()
    {
        DB::insert("INSERT INTO `location_countries` (`id`, `name`) VALUES
		(1, 'Brasil')");
    }
}

?>