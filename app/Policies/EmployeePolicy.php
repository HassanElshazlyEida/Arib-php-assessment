<?php

namespace App\Policies;

use App\Models\Employee;
use Illuminate\Auth\Access\Response;

class EmployeePolicy
{
    /**
     * Determine whether the Employee can view any models.
     */
    public function viewAny(Employee $Employee): bool
    {
       return true;
    }

    /**
     * Determine whether the Employee can view the model.
     */
    public function view(Employee $Employee, Employee $employee): bool
    {
       return true;
    }

    /**
     * Determine whether the Employee can create models.
     */
    public function create(Employee $Employee): bool
    {
       return true;
    }

    /**
     * Determine whether the Employee can update the model.
     */
    public function update(Employee $Employee, Employee $employee): bool
    {
       return true;
    }

    /**
     * Determine whether the Employee can delete the model.
     */
    public function delete(Employee $Employee, Employee $employee): bool
    {
       return true;
    }

    /**
     * Determine whether the Employee can restore the model.
     */
    public function restore(Employee $Employee, Employee $employee): bool
    {
       return true;
    }

    /**
     * Determine whether the Employee can permanently delete the model.
     */
    public function forceDelete(Employee $Employee, Employee $employee): bool
    {
       return true;
    }
}
