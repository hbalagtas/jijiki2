<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Jijiki\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {        
    	User::truncate();

        $data = [
        		'name' => 'Herbert Balagtas',
        		'email' => 'hbalagtas@live.com',
        		'email_verified_at' => null,
        		'password' => Hash::make('pancakes'),
        	];

     	User::create($data);
    }
}
