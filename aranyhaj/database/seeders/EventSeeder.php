<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Event;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Event::create([
            'owner_id' => 1,
            'salon_id' => 1,
            'title' => 'Aranyhaj',
            'location' => 'BGSZC Pestszentlőrinci Technikum',
            'short_information' => 'Üdv',
            'information' => 'Hello Üdvözöllek!',
            'image_name' => 'https://scontent.fbud5-1.fna.fbcdn.net/v/t39.30808-1/483593033_122096382218805455_5535533330312757654_n.jpg?stp=c312.0.1423.1423a_dst-jpg_s200x200_tt6&_nc_cat=106&ccb=1-7&_nc_sid=2d3e12&_nc_ohc=nukQIQjDs1gQ7kNvgEpsxAH&_nc_oc=AdnTgIdXWvU7xRi7olCbHe7C9FymFFDjrccvSY5RKAcKz1I2M1XElNwGI9rbL60EwTc&_nc_zt=24&_nc_ht=scontent.fbud5-1.fna&_nc_gid=v8WfKrNNheYUlcqsxzp0Bg&oh=00_AYE0UYPmli6OdF_s_JaY4JNxpyggCXaYpJd9nqyWPDoOuw&oe=67EAFD95',
            'starts_at' => now(),
        ]);
    }
}
