<?php

namespace App\Policies;

use App\Models\Employee;
use App\Models\Manager;
use App\Models\Task;

class TaskPolicy
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
    public function view(Manager $manager, Task $task): bool
    {
       
        return $manager->tasks()->where('id', $task->id)->exists();
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
    public function update(Manager $manager, Task $task): bool
    {
       
        return $manager->tasks()->where('id', $task->id)->exists();
    }

    /**
     * Determine whether the Manager can delete the model.
     */
    public function delete(Manager $manager, Task $task): bool
    {
       
        return $manager->tasks()->where('id', $task->id)->exists();
    }

    /**
     * Determine whether the Manager can restore the model.
     */
    public function restore(Manager $manager, Task $task): bool
    {
       
        return $manager->tasks()->where('id', $task->id)->exists();
    }

    /**
     * Determine whether the Manager can permanently delete the model.
     */
    public function forceDelete(Manager $manager, Task $task): bool
    {
       
        return $manager->tasks()->where('id', $task->id)->exists();
    }
}
