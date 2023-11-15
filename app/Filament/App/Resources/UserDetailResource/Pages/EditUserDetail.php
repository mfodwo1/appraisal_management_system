<?php

namespace App\Filament\App\Resources\UserDetailResource\Pages;

use App\Filament\App\Resources\UserDetailResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditUserDetail extends EditRecord
{
    protected static string $resource = UserDetailResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
