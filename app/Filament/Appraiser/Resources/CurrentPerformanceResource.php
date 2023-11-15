<?php

namespace App\Filament\Appraiser\Resources;

use App\Filament\Appraiser\Resources\CurrentPerformanceResource\Pages;
use App\Filament\Appraiser\Resources\CurrentPerformanceResource\RelationManagers;
use App\Filament\Appraiser\Resources\CurrentPerformanceResource\Widgets\CurrentPerformanceWidget;
use App\Models\CurrentPerformance;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Filament\Infolists\Components\TextEntry;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CurrentPerformanceResource extends Resource
{
    protected static ?string $model = CurrentPerformance::class;

    protected static ?string $navigationIcon = 'heroicon-o-puzzle-piece';
    protected static ?string $navigationLabel = 'Performance';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Fieldset::make()
                    ->schema([
                        Forms\Components\Hidden::make('appraiser_id')
                            ->disabled(true)
                            ->default(auth()->user()->id),

                        Forms\Components\Select::make('user_id')
                            ->options(User::where('department_id', auth()->user()->department_id)
                                ->role('Appraisee')
                                ->get()
                                ->pluck('name', 'id'))
                            ->required()
                            ->unique(ignoreRecord: true)
                            ->searchable()
                            ->preload()
                            ->columnSpan('full'),
                    Section::make('Rate limiting')
                        ->description('Please check the rating that you judge/assess best applies to the Appraisee based on the description/standard given for each rating')
                        ->schema([
                            Forms\Components\Radio::make('quality_of_work')
                                ->options([
                                    1 => 'Unsatisfactory',
                                    2 => 'Poor',
                                    3 => 'Satisfactory',
                                    4 => 'Very Good',
                                    5 => 'Excellent',
                                    ])
                                ->columns(5),
                            Forms\Components\Radio::make('job_knowledge')
                                ->options([
                                    1 => 'Unsatisfactory',
                                    2 => 'Poor',
                                    3 => 'Satisfactory',
                                    4 => 'Very Good',
                                    5 => 'Excellent',
                                ])
                                ->columns(5),
                            Forms\Components\Radio::make('initiative_resourcefulness')
                                ->options([
                                    1 => 'Unsatisfactory',
                                    2 => 'Poor',
                                    3 => 'Satisfactory',
                                    4 => 'Very Good',
                                    5 => 'Excellent',
                                ])
                                ->columns(5),
                            Forms\Components\Radio::make('attendance_dependability')
                                ->options([
                                    1 => 'Unsatisfactory',
                                    2 => 'Poor',
                                    3 => 'Satisfactory',
                                    4 => 'Very Good',
                                    5 => 'Excellent',
                                ])
                                ->columns(5),
                            Forms\Components\Radio::make('attitude_toward_work')
                                ->options([
                                    1 => 'Unsatisfactory',
                                    2 => 'Poor',
                                    3 => 'Satisfactory',
                                    4 => 'Very Good',
                                    5 => 'Excellent',
                                ])
                                ->columns(5),

                        ]),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('appraisee.name')
                    ->label('Name')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('quality_of_work')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: false),
                Tables\Columns\TextColumn::make('job_knowledge')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: false),
                Tables\Columns\TextColumn::make('initiative_resourcefulness')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: false),

                Tables\Columns\TextColumn::make('attendance_dependability')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: false),
                Tables\Columns\TextColumn::make('attitude_toward_work')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

            ])
            ->actions([
                Tables\Actions\ViewAction::make(),


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
            'index' => Pages\ListCurrentPerformances::route('/'),
            'create' => Pages\CreateCurrentPerformance::route('/create'),
            'view' => Pages\ViewCurrentPerformance::route('/{record}'),
            'edit' => Pages\EditCurrentPerformance::route('/{record}/edit'),
        ];
    }

    public static function getWidgets(): array
    {
        return [
          CurrentPerformanceWidget::class,
        ];
    }
    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->where('appraiser_id', auth()->user()->id);
    }
}
