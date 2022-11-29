<?php

namespace Database\Factories\Sensors;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\GenericSensor>
 */
class GenericSensorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->unique(),
            'ws_host' =>Str::random(10),
            'model' => Str::random(10),
            'type' => Str::random(10),
        ];
    }
}
