<?php

namespace App\Filament\App\Resources\UserDetailResource\Pages;

use App\Filament\App\Resources\UserDetailResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListUserDetails extends ListRecords
{
    protected static string $resource = UserDetailResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
