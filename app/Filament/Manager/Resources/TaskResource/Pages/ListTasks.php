<?php

namespace App\Filament\Manager\Resources\TaskResource\Pages;

use App\Filament\Manager\Resources\TaskResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;

class ListTasks extends ListRecords
{
    protected static string $resource = TaskResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
    protected function getTableQuery(): Builder
    {
        return parent::getTableQuery()->with(['manager','employee'])->where('manager_id',auth()->id());
    }
}
