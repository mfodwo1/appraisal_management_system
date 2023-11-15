<?php

namespace App\Filament\App\Resources;

use App\Filament\App\Resources\AppraiseeCommentResource\Pages;
use App\Filament\App\Resources\AppraiseeCommentResource\RelationManagers;
use App\Models\AppraiseeComment;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AppraiseeCommentResource extends Resource
{
    protected static ?string $model = AppraiseeComment::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
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
            'index' => Pages\ListAppraiseeComments::route('/'),
            'create' => Pages\CreateAppraiseeComment::route('/create'),
            'view' => Pages\ViewAppraiseeComment::route('/{record}'),
            'edit' => Pages\EditAppraiseeComment::route('/{record}/edit'),
        ];
    }    
}
