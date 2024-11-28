<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory()->create([
        //     'name' => 'Andrew',
        //     'email' => 'andrew@gmail.com',
        //     'password' => bcrypt('password')
        // ]);

        $this->call([
            UserSeeder::class,
            // CustomersSeeder::class,
            // EmployeesSeeder::class,
            // PetsSeeder::class,
            // ServicesSeeder::class,
            // ReservationsSeeder::class
        ]);

    }
}
