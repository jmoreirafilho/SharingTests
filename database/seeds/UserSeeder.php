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
			'password'=>\Hash::make('12345'),
			'name'=>'Airton Filho',
			'status_level' => 1
		]);
		Score::create([
			'user_id' => 1,
			'value' => 29384
		]);
	}
}
?>