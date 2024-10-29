<?php

namespace App\Filament\Manager\Resources\TaskResource\Pages;

use App\Filament\Manager\Resources\TaskResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateTask extends CreateRecord
{
    protected static string $resource = TaskResource::class;
    
    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['manager_id'] = auth()?->id();
        return $data;
    }

}
