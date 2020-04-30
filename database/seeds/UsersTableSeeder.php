<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\User::create([
        	'name' => 'Luis Rojas',
        	'email' => 'lrojas@tubrica.com',
        	'password' => 12345678,
        ]);
    }
}
