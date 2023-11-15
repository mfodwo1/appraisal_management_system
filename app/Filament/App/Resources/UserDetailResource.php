<?php

namespace App\Filament\App\Resources;

use App\Filament\App\Resources\UserDetailResource\Pages;
use App\Filament\App\Resources\UserDetailResource\RelationManagers;
use App\Models\UserDetail;
use Filament\Actions\CreateAction;
use Filament\Forms;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\Layout\Split;
use Filament\Tables\Columns\Layout\Stack;
use Filament\Tables\Columns\Summarizers\Sum;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Auth;

class UserDetailResource extends Resource
{
    protected static ?string $model = UserDetail::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make()
                    ->schema([
                        TextInput::make('staff_id')
                            ->label('Staff ID Number')
                            ->required()
                            ->numeric()
                            ->maxLength(10),
                        TextInput::make('surname')
                            ->required()
                            ->maxLength(255),
                        TextInput::make('other_names')
                            ->required()
                            ->maxLength(255),
                        DateTimePicker::make('date_of_birth'),
                        Select::make('Sex')
                            ->options([
                                'male' => 'Male',
                                'female' => 'Female',
                            ]),

                        Fieldset::make('Name of Directorate/Department/Unit')
                            ->schema([
                                TextInput::make('diocese')
                                    ->maxLength(25),
                                TextInput::make('district')
                                    ->maxLength(25),
                                TextInput::make('sub_district')
                                    ->label('Sub-District')
                                    ->maxLength(25),
                            ]),
                    ])->columns(2),

                Section::make()
                    ->schema([
                        DateTimePicker::make('first_appointment_date')
                            ->hint('Date should be completed as dd/mm/yy')
                            ->label('Date of 1st Appointment:'),
                        DateTimePicker::make('current_appointment_date')
                            ->hint('Date should be completed as dd/mm/yy')
                            ->label('Date of Current Appointment'),
                        TextInput::make('current_grade')
                            ->required()
                            ->maxLength(255),
                        TextInput::make('professional_category')
                            ->required()
                            ->maxLength(255),
                        TextInput::make('specialty')
                            ->required()
                            ->maxLength(255),
                        TextInput::make('basic_qualification')
                            ->label('Basic Qualification (Professional/Academic')
                            ->required()
                            ->maxLength(255),
                        DateTimePicker::make('basic_qualification_year')
                            ->hint('Date should be completed as dd/mm/yy'),
                        TextInput::make('additional_qualification')
                            ->required()
                            ->maxLength(255),
                        DateTimePicker::make('additional_qualification_year')
                            ->hint('Date should be completed as dd/mm/yy'),
                        TextInput::make('salary_level')
                            ->label('Current Salary Level')
                            ->required()
                            ->maxLength(255),
                        TextInput::make('current_step')
                            ->required()
                            ->maxLength(255),
                    ]),

            ]);

    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
//                Tables\Columns\Layout\Grid::make()
//                    ->columns(1)
//                    ->schema([
                Split::make([
                    Stack::make([
                        //formate the staff id column to display "ST" in front of all the staff id numbers
                        Tables\Columns\TextColumn::make('staff_id')
                            ->formatStateUsing(function ($state) {
                                return "Staff ID: " . $state;
                            }),

                        Tables\Columns\TextColumn::make('surname')
                            ->formatStateUsing(function ($state) {
                                return "Surname : " . $state;
                            }),
                        Tables\Columns\TextColumn::make('other_names')
                            ->formatStateUsing(function ($state) {
                                return "Other Name : " . $state;
                            }),
                        Tables\Columns\TextColumn::make('date_of_birth')
                            ->formatStateUsing(function ($state) {
                                return "Date of Birth: " . $state;
                            }),
                        Tables\Columns\TextColumn::make('sex')
                            ->formatStateUsing(function ($state) {
                                return "Sex : " . $state;
                            }),
                        Tables\Columns\TextColumn::make('diocese')
                            ->formatStateUsing(function ($state) {
                                return "Diocese : " . $state;
                            }),
                        Tables\Columns\TextColumn::make('district')
                            ->formatStateUsing(function ($state) {
                                return "District : " . $state;
                            }),
                        Tables\Columns\TextColumn::make('sub_district')
                            ->formatStateUsing(function ($state) {
                                return "Sub-District : " . $state;
                            }),
                        Tables\Columns\TextColumn::make('current_grade')
                            ->formatStateUsing(function ($state) {
                                return "Current Grade : " . $state;
                            }),
                        Tables\Columns\TextColumn::make('first_appointment_date')
                            ->formatStateUsing(function ($state) {
                                return "First Appointment Date : " . $state;
                            }),
                    ]),
                        Stack::make([
                        Tables\Columns\TextColumn::make('professional_category')
                            ->formatStateUsing(function ($state) {
                                return "Professional Category : " . $state;
                            }),
                        Tables\Columns\TextColumn::make('specialty')
                        ->formatStateUsing(function ($state) {
                            //leave 4 white space in front of the specialty name

                                return "Specialty : ".str_repeat(' ', 4) . $state;
                            }),
                        Tables\Columns\TextColumn::make('basic_qualification')
                        ->formatStateUsing(function ($state) {
                                return "Basic Qualification : " . $state;
                            }),
                        Tables\Columns\TextColumn::make('basic_qualification_year')
                            ->formatStateUsing(function ($state) {
                                return "Basic Qualification Year : " . $state;
                            }),
                        Tables\Columns\TextColumn::make('additional_qualification')
                        ->formatStateUsing(function ($state) {
                                return "Additional Qualification : " . $state;
                            }),
                        Tables\Columns\TextColumn::make('additional_qualification_year')
                            ->formatStateUsing(function ($state) {
                                return "Additional Qualification Year : " . $state;
                            }),
                        Tables\Columns\TextColumn::make('salary_level')
                        ->formatStateUsing(function ($state) {
                                return "Salary Level : " . $state;
                            }),
                        Tables\Columns\TextColumn::make('current_step')
                        ->formatStateUsing(function ($state) {
                                return "Current Step : " . $state;
                            }),
                        Tables\Columns\TextColumn::make('current_appointment_date')
                        ->formatStateUsing(function ($state) {
                                return "Current Appointment Date : " . $state;
                            }),
                    ]),
                ]),
//                        ]),
            ])
            ->paginated(false)

            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\ViewAction::make(),
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
            'index' => Pages\ListUserDetails::route('/'),
            'create' => Pages\CreateUserDetail::route('/create'),
            'edit' => Pages\EditUserDetail::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->where('user_id', Auth::id());
    }
}
