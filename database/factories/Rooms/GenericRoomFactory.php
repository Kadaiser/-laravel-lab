<?php

namespace Database\Factories\Rooms;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Rooms\GenericRooms>
 */
class GenericRoomFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => Str::random(10),
            'height' => fake()->randomDigit(),
            'width' => fake()->randomDigit(),
            'length' => fake()->randomDigit(),
            'volume' => fake()->randomDigit(),
            'floor' => Str::random(10),
            'type' => Str::random(10),
        ];
    }
}