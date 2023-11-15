<?php

namespace App\Filament\Appraiser\Resources;

use App\Filament\Appraiser\Resources\AppraiserCommentResource\Pages;
use App\Filament\Appraiser\Resources\AppraiserCommentResource\RelationManagers;
use App\Models\AppraiserComment;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;


class AppraiserCommentResource extends Resource
{
    protected static ?string $model = AppraiserComment::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Forms\Components\Select::make('appraisee_id')
                    ->options(User::where('department_id', auth()->user()->department_id)
                        ->role('Appraisee')
                        ->get()
                        ->pluck('name', 'id'))
                    ->required()
                    ->unique(ignoreRecord: true)
                    ->searchable()
                    ->preload(),
                Forms\Components\Textarea::make('comment'),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('appraisee.name')->label('Appraisee Name'),
                Tables\Columns\TextColumn::make('comment'),
                Tables\Columns\ToggleColumn::make('signed')->label('Completed')->toggleable(true)->toggleable(true)
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListAppraiserComments::route('/'),
            'create' => Pages\CreateAppraiserComment::route('/create'),
            'view' => Pages\ViewAppraiserComment::route('/{record}'),
            'edit' => Pages\EditAppraiserComment::route('/{record}/edit'),
        ];
    }


    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->where('appraiser_id', auth()->user()->id);
    }
}
