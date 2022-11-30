<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

         \App\Models\User::factory()->create([
             'username' => 'admin',
             'email' => 'admin@admin.com',
             'type' => 'App\\Models\\AdminUser',
             'password' => 'localdomus',
         ]);
         

         \App\Models\Buildings\GenericBuilding::factory()->create([
             'name' => 'Instalación secreta',
             'location' => '0000',
             'type' => 'App\\Models\\Buildings\\GenericBuilding',
         ]);

         \App\Models\Rooms\GenericRoom::factory()->create([
            'name' => 'Laboratorio A',
            'height' => 3,
            'width' => 10,
            'length' => 10,
            'volume' => 300,
            'floor' => 'PB',
            'type' => 'App\\Models\\Rooms\\GenericRoom',
            'building_id' => 1,
        ]);

         \App\Models\Sensors\GenericSensor::factory()->create([
            'name' => 'DHT11',
            'ws_host' => '192.168.1.20:8766',
            'model' => 'DHT11',
            'type' => 'App\\Models\\Sensors\\GenericSensor',
            'sensorable_id' => 1,
            'sensorable_type' => 'App\\Models\\Rooms\\GenericRoom',
        ]);


    }
}
