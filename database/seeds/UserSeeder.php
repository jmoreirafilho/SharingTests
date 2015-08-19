<?php 


use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder {

	/**
     * Run the database seeds.
     *
     * @return void
     */
    public function run ()
    {
		User::create([
			'email'=>'airtonmfilho@hotmail.com',
			'password'=>\Hash::make('12345'),
			'name'=>'Airton Filho',
		]);
	}
}
?>