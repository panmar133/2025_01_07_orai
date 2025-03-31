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
            'image_name' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSIibQMlyxzfPN0OvEwuvnxLEsGIOJHtq-wJQ&s',
            'admin' => 2,
        ]);
        User::create([
            'user_name' => 'Aranyhaj',
            'email' => 'aranyhaj@gmail.com',
            'address' => 'BGSZC Pestszentlőrinci Technikum',
            'password' => Hash::make('Aranyhaj'),
            'image_name' => 'https://scontent.fbud5-1.fna.fbcdn.net/v/t39.30808-6/480537265_122096391056805455_3519724393628887591_n.jpg?stp=dst-jpg_p552x414_tt6&_nc_cat=102&ccb=1-7&_nc_sid=127cfc&_nc_ohc=USRmzYa7RogQ7kNvgFGlOSh&_nc_oc=Adn5Hc66pPyGb0MtooSqVhFTFpq_91x_Tvx7InkGdjwKEFlZqEPo8DSmMAZIj2Y5p3U&_nc_zt=23&_nc_ht=scontent.fbud5-1.fna&_nc_gid=nFTpwBr1BJlNRv5qTTAIRA&oh=00_AYFvxWFplIUGgvWtEHgV8hKiYmkGhORO2qRncNzbT7O5UQ&oe=67EC8746',
            'admin' => 2,
        ]);
    }
}
