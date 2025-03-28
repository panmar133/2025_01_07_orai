<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'user_name' => 'Zoé',
            'email' => 'uraizoe12@gmail.com',
            'address' => 'Gyál Puskás utca 29/2',
            'password' => Hash::make('asdasdasd6'),  
            'image_name' => 'https://cdn-icons-png.flaticon.com/512/1144/1144760.png', 
            'admin' => 2, 
        ]);
        User::create([
            'user_name' => 'Aranyhaj',
            'email' => 'aranyhaj@gmail.com',
            'address' => 'BGSZC Pestszentlőrinci Technikum',
            'password' => Hash::make('Aranyhaj'),  
            'image_name' => 'https://cdn-icons-png.flaticon.com/512/1144/1144760.png', 
            'admin' => 2, 
        ]);
    }
}
