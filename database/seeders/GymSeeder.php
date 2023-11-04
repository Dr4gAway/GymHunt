<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

use File;

use App\Models\User;
use App\Models\Gym;

class GymSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $database = File::get('database/data/gyms.json');
        $gyms = json_decode($database);

        foreach($gyms as $index => $item)
        {
            $user = User::create([
                'name' => $item->user->name,
                'email' => $item->user->email,
                'phone' => $item->user->phone,
                'about' => $item->user->about,
                'avatar' => 'img/profile/default_avatar.jpeg',
                'banner' => 'img/profile/default_banner.png',
                'password' => $item->user->password,
                'remember_token' => Str::random(10),
            ]);

            Gym::create([
                'user_id' => $user->id,
                'cnpj' => $item->gym->cpnj,
                'open_schedule' => date('H:i', strtotime($item->gym->open_schedule)),
                'close_schedule' => date('H:i', strtotime($item->gym->close_schedule)),
                'city' => $item->gym->city,
                'district' => $item->gym->district,
                'state' => $item->gym->state,
                'street' => $item->gym->street,
                'number' => $item->gym->number,
                'longitude' => fake()->randomFloat(15, -180, 180),
                'latitude' => fake()->randomFloat(15, -90, 90)
            ]);
        }

        /* User::factory(10)->create()->each(function ($user) {
            Gym::factory()->create([
                'user_id' => $user->id
            ]);
        }); */
    }
}
