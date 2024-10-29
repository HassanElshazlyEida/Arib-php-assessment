<?php

namespace App\Filament\Employee\Resources;

use Filament\Forms;
use App\Models\Task;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Enums\TaskStatusEnum;
use Filament\Resources\Resource;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Manager\Resources\TaskResource\Pages;
use App\Filament\Manager\Resources\TaskResource\RelationManagers;
use Filament\Tables\Columns\BadgeColumn;

class EmployeeTaskResource extends Resource
{
    protected static ?string $model = Task::class;
    

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('description')
                    ->required(),
           
                Forms\Components\Select::make('status')
                    ->options(TaskStatusEnum::toArray())
                    ->required()
                    ->default(TaskStatusEnum::pending()->value),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')->sortable(),
                Tables\Columns\TextColumn::make('description')->limit(50),
                Tables\Columns\TextColumn::make('manager.name')->label('Manager'),
                BadgeColumn::make('status')

                    ->colors([
                        'primary' => TaskStatusEnum::pending()->value,
                        'success' => TaskStatusEnum::completed()->value,
                        'danger' => TaskStatusEnum::rejected()->value,
                    ])
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\ViewAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => \App\Filament\Employee\Resources\EmployeeTaskResource\Pages\ListTasks::route('/'),
        ];
    }
}
