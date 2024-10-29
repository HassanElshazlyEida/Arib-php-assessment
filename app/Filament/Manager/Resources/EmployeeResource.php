<?php

namespace App\Filament\Manager\Resources;

use App\Enums\TaskStatusEnum;
use Filament\Forms;
use App\Models\Task;
use Filament\Tables;
use App\Models\Employee;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Tables\Actions\Action;
use Filament\Resources\Resource;
use Filament\Actions\ActionGroup;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Manager\Resources\EmployeeResource\Pages;
use App\Filament\Manager\Resources\EmployeeResource\RelationManagers;
use Filament\Notifications\Notification;


class EmployeeResource extends Resource
{
    protected static ?string $model = Employee::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('first_name')
                ->required()
                ->maxLength(255),
            Forms\Components\TextInput::make('last_name')
                ->required()
                ->maxLength(255),
            Forms\Components\TextInput::make('phone')
                ->required() 
                ->maxLength(15) 
                ->tel(), 
            Forms\Components\TextInput::make('salary')
                ->required()
                ->numeric(),
            Forms\Components\FileUpload::make('image')
                ->nullable()
                ->disk('public'), 
            Forms\Components\TextInput::make('email')
                ->required()
                ->email()
                ->maxLength(255),
            Forms\Components\TextInput::make('password')
                ->dehydrateStateUsing(fn ($state) => Hash::make($state))
                ->dehydrated(fn ($state) => filled($state))
                ->required(fn (string $context): bool => $context === 'create')
                ->password()
                ->minLength(8)
                ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')->searchable(query: function ($query, $search) {
                    $query->where('first_name', 'like', "%{$search}%")
                        ->orWhere('last_name', 'like', "%{$search}%");
                }),
                Tables\Columns\TextColumn::make('email')->searchable(),
                Tables\Columns\TextColumn::make('phone')->searchable(), 
                Tables\Columns\TextColumn::make('salary'),
                Tables\Columns\ImageColumn::make('image')
                    ->disk('public'), 
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\ViewAction::make(),
                    Tables\Actions\DeleteAction::make(),
                ]),
                Action::make("Assign task")
                ->icon('heroicon-m-pencil-square')
                ->form([
                    Forms\Components\TextInput::make('name')
                        ->label('Task Name')
                        ->required(),
                    Forms\Components\Textarea::make('description')
                        ->label('Description')
                        ->required(),
                ])
                ->action(function (array $data, Employee $record) {
                    
                    Task::create([
                        'name' => $data['name'],
                        'description' => $data['description'],
                        'employee_id' => $record->id, 
                        'manager_id'=> auth()?->id(),
                        'status'=> TaskStatusEnum::pending()
                    ]);

                    Notification::make()
                    ->title('Task assigned successfully.')
                    ->success()
                    ->send();

                }),

            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]) ->searchable(true);
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
            'index' => Pages\ListEmployees::route('/'),
            'create' => Pages\CreateEmployee::route('/create'),
            'view' => Pages\ViewEmployee::route('/{record}'),
            'edit' => Pages\EditEmployee::route('/{record}/edit'),
        ];
    }

}
