<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Pets;

class PetsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Pets::create([
            'customer_id' => 1,
            'name' => 'Fluffy',
            'breed' => 'Cat',
            'age' => 2,
            'gender' => 'male',
            'weight' => 5,
        ]);

        Pets::create([
            'customer_id' => 2,
            'name' => 'Spot',
            'breed' => 'Dog',
            'age' => 3,
            'gender' => 'female',
            'weight' => 6,
        ]);

        Pets::create([
            'customer_id' => 3,
            'name' => 'Max',
            'breed' => 'Dog',
            'age' => 4,
            'gender' => 'male',
            'weight' => 7,
        ]);
    }
}
