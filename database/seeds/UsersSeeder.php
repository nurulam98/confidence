<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use phpDocumentor\Reflection\Types\Null_;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            ['id' => 1, 'name' => 'System Admin', 'email' => 'nurulakbarmalik98@gmail.com', 'username' => 'nurulam','no_handphone' => '085603030503', 'address' => 'Jl. Makmur Raya', 'kota' => 'Jakarta', 'email_verified_at' => Carbon::now()->format('Y-m-d H:i:s'), 'isAdmin' => false, 'isIT' => true, 'isUser' => false, 'password' => Hash::make('noviaelis'), 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')]
        ]);
    }
}
