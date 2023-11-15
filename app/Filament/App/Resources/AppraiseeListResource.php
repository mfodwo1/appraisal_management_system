<?php

namespace App\Filament\App\Resources;

use App\Filament\App\Resources\AppraiseeListResource\Pages;
use App\Filament\App\Resources\AppraiseeListResource\RelationManagers;
use App\Filament\App\Resources\AppraiseeListResource\Widgets\AppraiseeListWidget;
use App\Models\AppraiseeList;
use App\Models\SettingObjective;
use App\Models\User;
use App\Models\UserDetail;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AppraiseeListResource extends Resource
{
    protected static ?string $model = AppraiseeList::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Textarea::make('user_id')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Repeater::make('settingObjective')
                    ->relationship()
                    ->schema([
                Forms\Components\Textarea::make('objectives')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('activities')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Radio::make('Rating')
                    ->options([
                        '1' => '1',
                        '2' => '2',
                        '3' => '3',
                        '4' => '4',
                        '5' => '5',
                    ])
                    ->columns(5),
                Forms\Components\Textarea::make('comments')
                    ->required()
                    ->maxLength(255),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user_id'),
            ])
            ->filters([
                //
            ])
            ->actions([
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
            'index' => Pages\ListAppraiseeLists::route('/'),
            'create' => Pages\CreateAppraiseeList::route('/create'),
            'edit' => Pages\EditAppraiseeList::route('/{record}/edit'),
        ];
    }

    public static function getWidgets(): array
    {
        return [
            AppraiseeListWidget::class,
        ];
    }
}
