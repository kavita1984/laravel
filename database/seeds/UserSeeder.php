<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\Hash;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::create([
			'name' => 'admin',
			'email' => 'admin@gmail.com',
			'password' => Hash::make('12345678'),
			'role' => 0,
		]);
        User::create([
			'name' => 'ravindra',
			'email' => 'ravindra@gmail.com',
			'password' => Hash::make('12345678'),
			'role' => 1,
		]);
        User::create([
            'name' => 'praveen',
            'email' => 'praveen@gmail.com',
            'password' => Hash::make('12345678'),
            'role' => 1,
        ]);
    }
}
