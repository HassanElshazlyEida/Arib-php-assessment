<?php

namespace App\Models;

use App\Enums\TaskStatusEnum;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'name',
        'description',
        'employee_id',
        'manager_id',
        'status'
    ];



    public function manager(){
        return $this->belongsTo(Manager::class);
    }
    public function employee(){
        return $this->belongsTo(Employee::class);
    }
}
   