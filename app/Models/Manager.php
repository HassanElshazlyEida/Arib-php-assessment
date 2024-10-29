<?php

namespace App\Models;


use Filament\Panel;
use Filament\Models\Contracts\HasName;
use Illuminate\Database\Eloquent\Model;
use Filament\Models\Contracts\FilamentUser;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Manager extends Authenticatable implements FilamentUser,HasName
{
    protected $guard = 'manager';
    protected $table = 'managers';
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone'
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
        return "{$this->name}";
    }
}
