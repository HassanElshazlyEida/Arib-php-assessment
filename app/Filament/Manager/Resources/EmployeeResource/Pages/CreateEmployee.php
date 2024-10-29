<?php

namespace App\Filament\Manager\Resources\EmployeeResource\Pages;

use App\Filament\Manager\Resources\EmployeeResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateEmployee extends CreateRecord
{
    protected static string $resource = EmployeeResource::class;
     
    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['manager_id'] = auth()?->id();
        return $data;
    }
}
