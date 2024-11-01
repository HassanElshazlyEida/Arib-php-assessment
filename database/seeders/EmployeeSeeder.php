<?php

namespace Database\Seeders;

use App\Models\Department;
use App\Models\Manager;
use App\Models\Employee;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        $managers = Manager::all();
        $departments = Department::all();
        $employees = [];
        $password = Hash::make('fJEIBzwnKOPQRfyXgRPQ10jg', ['rounds' => 4]); 


        Employee::create([
            'first_name' => $faker->firstName,
            'last_name' => $faker->lastName,
            'phone' => '1234567890',
            'email' => 'employee@test.com',
            'manager_id' => $managers->random()->id,
            'salary' => $faker->randomFloat(2, 3000, 5000),
            'department_id' => $departments->random()->id,
            'password' => Hash::make('fJEIBzwnKOPQRfyXgRPQ10jg'),
        ]);


        foreach (range(1, 50) as $index) {
            $employees[] = [
                'first_name' => $faker->firstName,
                'last_name' => $faker->lastName,
                'phone'=>$faker->phoneNumber,
                'email' => $faker->unique()->safeEmail,
                'salary' => $faker->randomFloat(2, 3000, 5000),
                'manager_id' => $managers->random()->id,
                'department_id' => $departments->random()->id,
                'password' => $password,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('employees')->insert($employees);
    }
}
