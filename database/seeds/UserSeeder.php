<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
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
        DB::table('users')->insert([
            ['id' => 1, 'name' => 'IT ADMIN', 'email' => 'nurulakbarmalik98@gmail.com', 'username' => 'nurulam','no_handphone' => '085603030503', 'email_verified_at' => now(), 'isAdmin' => false, 'isIT' => true, 'password' => Hash::make('noviaelis'), 'created_at' => now(), 'updated_at' => now()],
            []
        ]);
    }
}
