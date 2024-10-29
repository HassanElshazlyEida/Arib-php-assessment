<?php

namespace App\Filament\Manager\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use App\Models\Department;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Illuminate\Support\Facades\DB;
use Filament\Tables\Actions\Action;
use Filament\Notifications\Notification;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Manager\Resources\DepartmentResource\Pages;
use App\Filament\Manager\Resources\DepartmentResource\RelationManagers;

class DepartmentResource extends Resource
{
    protected static ?string $model = Department::class;

    protected static ?string $navigationIcon = 'heroicon-o-building-office';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                ->required()
                ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')->searchable(),
                Tables\Columns\TextColumn::make('employees_count')
                ->label('Employees Count')
                ->counts('employees'),
                Tables\Columns\TextColumn::make('employees_sum_salary')
                ->label('Total Salary')

                ->money('USD')
                ])
                ->query(
                    Department::withSum('employees', 'salary')
                )
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Action::make("Delete")
                ->color('danger')
                ->icon('heroicon-o-trash')
                ->action(function (array $data, Department $department) {
                    if($department->employees->count() > 1){
                        Notification::make()
                        ->title('Cannot delete a department that has employees associated with it.')
                        ->danger()
                        ->send();
                    }else{
                        $department->delete();
                        Notification::make()
                        ->title('Department has been deleted successfully')
                        ->success()
                        ->send();
    
    
                    }
          
                
                }),
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
            'index' => Pages\ListDepartments::route('/'),
            'create' => Pages\CreateDepartment::route('/create'),
            'edit' => Pages\EditDepartment::route('/{record}/edit'),
        ];
    }
}
