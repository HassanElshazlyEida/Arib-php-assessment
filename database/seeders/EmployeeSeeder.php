<?php

namespace Database\Seeders;

use App\Models\Manager;
use App\Models\Employee;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        $managers = Manager::all();
        $employees = [];
        $password = Hash::make('password', ['rounds' => 4]); 

        foreach (range(1, 50) as $index) {
            $employees[] = [
                'first_name' => $faker->firstName,
                'last_name' => $faker->lastName,
                'phone'=>$faker->phoneNumber,
                'email' => $faker->unique()->safeEmail,
                'salary' => $faker->randomFloat(2, 3000, 5000),
                'manager_id' => $managers->random()->id,
                'password' => $password,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        Employee::insert($employees);
    }
}
