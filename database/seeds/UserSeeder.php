<?php 


use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Score;

class UserSeeder extends Seeder {

	/**
     * Run the database seeds.
     *
     * @return void
     */
    public function run ()
    {
		User::create([
			'id' => 1,
			'email'=>'airtonmfilho@hotmail.com',
			'password'=>\Hash::make('jamfjamadsm1995'),
			'name'=>'Airton Filho',
			'status_level' => 1
		]);
		User::create([
			'id' => 2,
			'email' => 'rafafroes@outlook.com',
			'password' => \Hash::make('rafa000598741'),
			'name' => 'Rafael Froes',
			'status_level' => 1
		]);
		Score::create([
			'user_id' => 1,
			'value' => 29384
		]);
	}
}
?>