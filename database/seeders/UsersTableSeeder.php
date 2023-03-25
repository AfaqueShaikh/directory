<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		DB::table('users')->insert([
            'name' => 'Super Admin',
            'username' => 'admin',
            'email' => 'admin@gmail.com',
            'mobile_number' => '9762137636',
            'password' => bcrypt('Pass@123'),
            'user_type' => 'admin',
            'email_verified' => 1,
            'status' => '1',
            'is_admin' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('users')->insert([
            'name' => 'Anand Singh',
            'username' => 'anand',
            'email' => 'devrsingh2@gmail.com',
            'mobile_number' => '9422412288',
            'password' => bcrypt('Pass@123'),
            'user_type' => 'user',
            'email_verified' => 1,
            'status' => '1',
            'is_admin' => 0,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
    }
}
