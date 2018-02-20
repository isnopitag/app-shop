<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
        	'name' => 'Maluma',
            'email'=>'maluma@baby.com',
            'password'=>bcrypt('1337'),
            'admin'=>true
        ]);
    }
}
