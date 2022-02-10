<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PropertySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('property')->insert([
            'created_at' => now(),
            'updated_at' => now(),
            'uploaded_by' => 1,
            'owner_id' => 1,
            'name' => 'plot in bamburi',
            'description' => 'description for land',
            'location' => 'bamburi',
            'type' => 'Land',
            'status' => 'For Sale',
            'terms' => 'Monthly',
            'price' => '20,000',
            'total_units' => '20',
            'available_units' => '30',
        ]);
    }
}
