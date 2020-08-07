<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\User::create(
        	[
	        	'name'     => 'Sam',
	        	'email'    => 'sam@gmail.com',
	        	'phone'    => '8787878787',
	        	'city'     => 'Bengaluru',
	        	'password' => Hash::make('123456')
	        ],
        );

        \App\User::create(
        	[
	        	'name'     => 'Eagle',
	        	'email'    => 'eagle@gmail.com',
	        	'phone'    => '8787878787',
	        	'city'     => 'Bengaluru',
	        	'password' => Hash::make('123456')
	        ],
        );


        \App\User::create(
        	[
	        	'name'     => 'Fox',
	        	'email'    => 'fox@gmail.com',
	        	'phone'    => '8787878787',
	        	'city'     => 'Bengaluru',
	        	'password' => Hash::make('123456')
	        ],
        );
    }
}
