<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SalonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('salons')->insert([
            ['owner_id' => 1, 'salon_name' => 'Elite Salon', 'salon_location' => 'Downtown'],
            ['owner_id' => 2, 'salon_name' => 'Luxury Cuts', 'salon_location' => 'Uptown'],
            ['owner_id' => 3, 'salon_name' => 'Modern Styles', 'salon_location' => 'City Center'],
        ]);
    }
}
