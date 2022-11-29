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

         \App\Models\Sensors\GenericSensor::factory()->create([
            'name' => 'DHT11',
            'ws_host' => '192.168.1.20:8766',
            'model' => 'DHT11',
            'type' => 'App\\Models\\Sensors\\GenericSensor',
        ]);
    }
}
