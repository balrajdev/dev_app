<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user= User::create(['name' => 'balraj', 'email' => 'balraj@gmail.com', 'password' => 'balrajdev']);
    }
}
