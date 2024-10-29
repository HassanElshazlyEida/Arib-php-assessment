<?php

namespace App\Policies;

use App\Models\Employee;
use App\Models\Manager;
use App\Models\Task;
class TaskPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny($user): bool
    {
        return true; 
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view($user, Task $task): bool
    {
        if ($user instanceof Manager) {
            return $user->tasks()->where('id', $task->id)->exists(); 
        }

        if ($user instanceof Employee) {
            return $user->tasks()->where('id', $task->id)->exists(); 
        }

        return false; 
    }

    /**
     * Determine whether the user can create models.
     */
    public function create($user): bool
    {
        return $user instanceof Manager; 
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update($user, Task $task): bool
    {
        if ($user instanceof Manager) {
            return $user->tasks()->where('id', $task->id)->exists(); 
        }

        if ($user instanceof Employee) {
            return $user->tasks()->where('id', $task->id)->exists(); 
        }

        return false; 
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete($user, Task $task): bool
    {
        if ($user instanceof Manager) {
            return $user->tasks()->where('id', $task->id)->exists(); 
        }

        if ($user instanceof Employee) {
            return false; 
        }

        return false; 
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore($user, Task $task): bool
    {
        return $this->delete($user, $task); 
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete($user, Task $task): bool
    {
        return $this->delete($user, $task); 
    }
}