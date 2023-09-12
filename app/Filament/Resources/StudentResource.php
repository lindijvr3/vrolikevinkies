<?php

namespace App\Filament\Resources;

use App\Filament\Resources\StudentResource\Pages;
use App\Filament\Resources\StudentResource\RelationManagers;
use App\Models\Student;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\GlobalSearch\Actions\Action;



class StudentResource extends Resource
{
    protected static ?string $model = Student::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';

    protected static ?string $recordTitleAttribute='name';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make(name:'name')-> required()->maxLength(length:'255'),
                Forms\Components\TextInput::make(name:'student_id')-> required()->minLength(length:'10'),
                Forms\Components\TextInput::make(name:'address_1')-> required(),
                Forms\Components\TextInput::make(name:'address_2')-> required(),
                Forms\Components\Select::make(name:'standard_id')-> required()->relationship('standard', 'name'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make(name: 'name')->searchable(),
                Tables\Columns\TextColumn::make(name:'standard.name')->searchable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make(name:'All Standards')
                ->relationship('standard', 'name')
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make(),
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
            'index' => Pages\ListStudents::route('/'),
            'create' => Pages\CreateStudent::route('/create'),
            'edit' => Pages\EditStudent::route('/{record}/edit'),
        ];
    }    

    public static function getGlobalSearchResultDetails( $record):array
    {
        return [
            'Name' =>$record->name,
            'Standard' => $record ->standard->name,
        ];
    }
 /*   public static function getGloballySearchableAttributes(): array
{
    return ['name', 'standard_id.name'];
}*/

    


    public static function getGlobalSearchResultActions($record):array
    {
        return [
            Action::make(name:'Edit')
            ->iconButton()
            ->icon(icon:'heroicon-s-pencil')
            ->url(static::getUrl('edit', ['record'=>$record]))
        ];
    }
}
