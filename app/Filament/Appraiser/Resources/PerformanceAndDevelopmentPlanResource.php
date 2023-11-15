<?php

namespace App\Filament\Appraiser\Resources;

use App\Filament\Appraiser\Resources\PerformanceAndDevelopmentPlanResource\Pages;
use App\Filament\Appraiser\Resources\PerformanceAndDevelopmentPlanResource\RelationManagers;
use App\Models\PerformanceAndDevelopmentPlan;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Infolists\Components\View;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PerformanceAndDevelopmentPlanResource extends Resource
{
    protected static ?string $model = PerformanceAndDevelopmentPlan::class;

    protected static ?string $navigationIcon = 'heroicon-o-rocket-launch';
    protected static ?string $navigationLabel = 'Plan';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('appraisee_id')
                    ->options(User::whereHas('department', function ($query) {
                        $query->where('appraiser_id', auth()->user()->id);
                    })->role('Appraisee')
                        ->get()
                        ->pluck('name', 'id'))
                    ->required()
                    ->unique(ignoreRecord: true)
                    ->searchable()
                    ->preload(),

                Forms\Components\TextInput::make('strength')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('weakness')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('recommended_training')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('appraisee_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('appraisee.name')
                    ->label('Name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('weakness')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: false),
                Tables\Columns\TextColumn::make('recommended_training')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: false),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
            'index' => Pages\ListPerformanceAndDevelopmentPlans::route('/'),
            'create' => Pages\CreatePerformanceAndDevelopmentPlan::route('/create'),
            'view' => Pages\ViewPerformanceAndDevelopmentPlan::route('/{record}'),
            'edit' => Pages\EditPerformanceAndDevelopmentPlan::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->where('appraiser_id', auth()->user()->id);
    }
}
