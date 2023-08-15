<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Post;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /* $user = User::query()->first();

        Post::factory(10)->create([
            'created_by' => $user
        ]); */

        $this->call([
        UserSeeder::class,
        PostSeeder::class,
    ]);
    }
}
