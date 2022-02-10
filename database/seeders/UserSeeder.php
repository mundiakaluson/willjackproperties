<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
            'name' => 'Wilson',
            'email' => 'wilson@willjack.com',
            'is_admin' => true,
            'password' => 'wilson123'
        ]);

        DB::table('users')->insert([
            'name' => 'John',
            'email' => 'john@gmail.com',
            'is_admin' => false,
            'password' => 'John123'
        ]);
    }
}
