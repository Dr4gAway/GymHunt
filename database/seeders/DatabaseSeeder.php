<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use \App\Models\User;
use \App\Models\Common;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        $user = User::factory()->create([
             'name' => 'Test User',
             'email' => 'test@example.com',
             'password' => 'fodastico',
             'phone' => fake()->phoneNumber(),
        ]);

        Common::create([
            'cpf' => '12345678911',
            'birth' => fake()->date(),
            'user_id' => $user->id
        ]);

        $user2 = User::factory()->create([
             'name' => 'Bruno Suwa',
             'email' => 'Bruno@example.com',
             'password' => 'brunobsi',
             'phone' => fake()->phoneNumber(),
        ]);

        Common::create([
            'cpf' => '12345678911',
            'birth' => fake()->date(),
            'user_id' => $user2->id
        ]);
    }
}
