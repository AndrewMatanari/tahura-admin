<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Employees;

class EmployeesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Employees::create([
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'phone' => '123-456-7890',
            'role' => 'walker',
        ]);

        Employees::create([
            'name' => 'Jane Smith',
            'email' => 'jane@example.com',
            'phone' => '987-654-3210',
            'role' => 'day_taker',
        ]);

        Employees::create([
            'name' => 'Alice Johnson',
            'email' => 'alice@example.com',
            'phone' => '555-555-5555',
            'role' => 'petsitter',
        ]);
    }
}
