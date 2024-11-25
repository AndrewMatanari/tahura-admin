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
            'nip' => '1234567890',
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'phone' => '123-456-7890',
            'JobTitle' => 'employee',
            'photo' => 'public/1.jpg'
        ]);

        Employees::create([
            'nip' => '12345678901',
            'name' => 'Jane Smith',
            'email' => 'jane@example.com',
            'phone' => '987-654-3210',
            'JobTitle' => 'employee',
            'photo' => 'public/2.jpg'
        ]);

        Employees::create([
            'nip'=> '123123131123',
            'name' => 'Alice Johnson',
            'email' => 'alice@example.com',
            'phone' => '555-555-5555',
            'JobTitle' => 'employee',
            'photo' => 'public/3.jpg'
        ]);
    }
}
