<?php

namespace App\Models;

use Filament\Panel;
use Filament\Models\Contracts\HasName;
use Illuminate\Database\Eloquent\Model;
use Filament\Models\Contracts\FilamentUser;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Employee extends Authenticatable  implements FilamentUser,HasName

{
    protected $guard = 'employee';
    protected $table = 'employees';
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'password',
        'salary',
        'image',
        'manager_id'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
    protected function casts(): array
    {
        return [
            'password' => 'hashed',
        ];
    }
    public function canAccessPanel(Panel $panel): bool {
        return true;
    }
    public function getFilamentName(): string
    {
        return "{$this->first_name} {$this->last_name}";
    }
    public function getNameAttribute(): string
    {
        return "{$this->first_name} {$this->last_name}";
    }
    public function manager(){
        return $this->belongsTo(Manager::class);
    }
}

