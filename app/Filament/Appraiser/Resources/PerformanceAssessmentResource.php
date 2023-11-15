<?php

namespace App\Filament\Appraiser\Resources;

use App\Filament\Appraiser\Resources\PerformanceAssessmentResource\Pages;
use App\Filament\Appraiser\Resources\PerformanceAssessmentResource\RelationManagers;
use App\Models\PerformanceAssessment;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PerformanceAssessmentResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-check-badge';
    protected static ?string $navigationLabel = 'Assessments';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Repeater::make('performanceAssessment')
                    ->relationship()
                    ->schema([
                        Forms\Components\Textarea::make('objectives')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\Textarea::make('activities')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\Textarea::make('Rating')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\Textarea::make('comments')
                            ->required()
                            ->maxLength(255),
                    ])->columnSpan('full')
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn:: make('performanceAssessment.objectives')
                    ->label('Objectives')
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn:: make('performanceAssessment.activities')
                    ->label('Activities')
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn:: make('performanceAssessment.Rating')
                    ->label('Rating')
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn:: make('performanceAssessment.comments')
                    ->label('Comments')
                    ->toggleable(isToggledHiddenByDefault: true),

            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make()
                ->label('Assess Performance'),
                Tables\Actions\Action::make('Download pfd')
                    ->icon('heroicon-o-inbox-arrow-down')
                    ->url(function (User $record) {
                        return route('appraisee.pdf.download', $record->id);
                    }
                    ),
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
            'index' => Pages\ListPerformanceAssessments::route('/'),
            'create' => Pages\CreatePerformanceAssessment::route('/create'),
            'edit' => Pages\EditPerformanceAssessment::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return User::whereHas('department', function ($query) {
            $query->where('appraiser_id', auth()->user()->id);
        })->role('Appraisee');
    }
}
