<?php

namespace App\Filament\Employee\Resources\EmployeeTaskResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Manager\Resources\TaskResource;
use App\Filament\Employee\Resources\EmployeeTaskResource;

class ListTasks extends ListRecords
{
    protected static string $resource = EmployeeTaskResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
    protected function getTableQuery(): Builder
    {
        return parent::getTableQuery()->where('employee_id',auth()->id());
    }
}
