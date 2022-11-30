<?php

namespace Database\Factories\Buildings;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Buildings\GenericBuilding>
 */
class GenericBuildingFactory extends Factory
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
            'location' => Str::random(10),
            'type' => Str::random(10),
        ];
    }
}