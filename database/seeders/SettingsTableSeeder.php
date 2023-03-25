<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Main Information
		DB::table('settings')->insert([
            'name' => 'info',
            'key' => 'site_title',
            'value' => 'Au Browser'
        ]);

        DB::table('settings')->insert([
            'name' => 'info',
            'key' => 'reward',
            'value' => 5 //minutes per reward
        ]);
    }
}
