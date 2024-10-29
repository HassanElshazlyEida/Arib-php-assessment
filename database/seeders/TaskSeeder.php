<?php

namespace Database\Seeders;

use App\Models\Task;
use App\Models\Manager;
use App\Models\Employee;
use App\Enums\TaskStatusEnum;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $managers = Manager::pluck('id')->toArray();
        $employees = Employee::pluck('id')->toArray();

        for ($i = 1; $i <= 10; $i++) {
            $tasks[] = [
                'name' => 'Task ' . $i,
                'description' => 'Description for task ' . $i,
                'manager_id' => $managers[array_rand($managers)],
                'employee_id' => $employees[array_rand($employees)], 
                'status'=> TaskStatusEnum::pending(),
                'created_at' => now(),
                'updated_at' => now(), 
            ];
        }

        DB::table('tasks')->insert($tasks);
    }
}
