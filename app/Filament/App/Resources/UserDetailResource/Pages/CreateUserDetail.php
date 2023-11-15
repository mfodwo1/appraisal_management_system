<?php

namespace App\Filament\App\Resources\UserDetailResource\Pages;

use App\Filament\App\Resources\UserDetailResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateUserDetail extends CreateRecord
{

    protected static string $resource = UserDetailResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['user_id'] = auth()->id();

        return $data;
    }
}
