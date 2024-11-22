<?php

namespace Database\Seeders;

use App\Models\Services;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServicesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Services::create([
            'name' => 'Day Taker',
            'employee_id' => 2,
            'description' => 'Day taker service',
            'price' => 500000.00
        ]);

        Services::create([
            'name' => 'Walker',
            'employee_id' => 1,
            'description' => 'Walker service',
            'price' => 200000.00
        ]);

        Services::create([
            'name' => 'Petsitter',
            'employee_id' => 3,
            'description' => 'Petsitter service',
            'price' => 100000.00
        ]);
    }
}
