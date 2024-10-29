<?php

namespace App\Policies;

use App\Models\Manager;
use Illuminate\Auth\Access\Response;

class ManagerPolicy
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
    public function view(Manager $Manager, Manager $manager): bool
    {
        return true;
    }

    /**
     * Determine whether the Manager can create models.
     */
    public function create(Manager $Manager): bool
    {
        return true;
    }

    /**
     * Determine whether the Manager can update the model.
     */
    public function update(Manager $Manager, Manager $manager): bool
    {
        return true;
    }

    /**
     * Determine whether the Manager can delete the model.
     */
    public function delete(Manager $Manager, Manager $manager): bool
    {
        return true;
    }

    /**
     * Determine whether the Manager can restore the model.
     */
    public function restore(Manager $Manager, Manager $manager): bool
    {
        return true;
    }

    /**
     * Determine whether the Manager can permanently delete the model.
     */
    public function forceDelete(Manager $Manager, Manager $manager): bool
    {
        return true;
    }
}
