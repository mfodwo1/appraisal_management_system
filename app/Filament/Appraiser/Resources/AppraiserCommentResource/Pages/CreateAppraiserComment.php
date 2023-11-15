<?php

namespace App\Filament\Appraiser\Resources\AppraiserCommentResource\Pages;

use App\Filament\Appraiser\Resources\AppraiserCommentResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateAppraiserComment extends CreateRecord
{
    protected static string $resource = AppraiserCommentResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['appraiser_id'] = auth()->id();

        return $data;
    }
}
