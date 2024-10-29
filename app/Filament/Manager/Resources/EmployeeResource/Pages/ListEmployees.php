<?php

namespace App\Filament\Manager\Resources\EmployeeResource\Pages;

use Filament\Actions;
use Filament\Tables\Table;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Manager\Resources\EmployeeResource;
use Illuminate\Database\Eloquent\Builder;
class ListEmployees extends ListRecords
{
    protected static string $resource = EmployeeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    protected function getTableQuery(): Builder
    {
        return parent::getTableQuery()->with('manager')->where('manager_id',auth()->id());
    }
 
}
