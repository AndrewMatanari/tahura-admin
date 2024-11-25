<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Customer;

class CustomersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        for ($i = 1; $i <=1000; $i++) {
            Customer::create([
                'name' => "Customer $i",
                'email' => "customer$i@example.com",
                'phone' => "123-456-$i",
                'address' => "$i Main St",
                'photo' => "public/" . ($i % 8 + 1) . ".jpg"
            ]);
        }
    }
}
