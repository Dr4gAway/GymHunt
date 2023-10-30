<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use Illuminate\Support\Str;

use App\Models\Gym;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Gym>
 */
class GymFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => null,
            'cnpj' => fake()->numerify('##############'),
            'open_schedule' => fake()->date('H:i'),
            'close_schedule' => fake()->date('H:i'),
            'city' => fake()->city(),
            'district' => fake()->name(),
            'state' => Str::random(2),
            'street' => fake()->streetName(),
            'number' => fake()->numberBetween(0, 6),
            'longitude' => fake()->randomFloat(15, -180, 180),
            'latitude' => fake()->randomFloat(15, -90, 90)
        ];
    }
}
