<?php

namespace App\Policies;

use App\Models\Employee;
use App\Models\Manager;

class EmployeePolicy
{
    /**
     * Determine whether the Manager can view any models.
     */
    public function viewAny(Manager $Manager): bool
    {
        return true;
    }

    /**
     * Determine whether the Manager can view the model.
     */
    public function view(Manager $manager, Employee $employee): bool
    {
       
        return $manager->employees()->where('id', $employee->id)->exists();
    }

    /**
     * Determine whether the Manager can create models.
     */
    public function create(Manager $manager): bool
    {
        return true;
    }

    /**
     * Determine whether the Manager can update the model.
     */
    public function update(Manager $manager, Employee $employee): bool
    {
       
        return $manager->employees()->where('id', $employee->id)->exists();
    }

    /**
     * Determine whether the Manager can delete the model.
     */
    public function delete(Manager $manager, Employee $employee): bool
    {
       
        return $manager->employees()->where('id', $employee->id)->exists();
    }

    /**
     * Determine whether the Manager can restore the model.
     */
    public function restore(Manager $manager, Employee $employee): bool
    {
       
        return $manager->employees()->where('id', $employee->id)->exists();
    }

    /**
     * Determine whether the Manager can permanently delete the model.
     */
    public function forceDelete(Manager $manager, Employee $employee): bool
    {
       
        return $manager->employees()->where('id', $employee->id)->exists();
    }
}
