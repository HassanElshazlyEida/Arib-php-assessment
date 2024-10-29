<?php

namespace Database\Seeders;

use App\Models\Manager;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;


class ManagerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Manager::create([
            'name' => 'John Doe',
            'phone' => '1234567890',
            'email' => 'first_manager@test.com',
            'password' => Hash::make('password'),
        ]);

        Manager::create([
            'name' => 'Jane Smith',
            'phone' => '0987654321',
            'email' => 'second_manager@test.com',
            'password' => Hash::make('password'),
        ]);
    }
}
