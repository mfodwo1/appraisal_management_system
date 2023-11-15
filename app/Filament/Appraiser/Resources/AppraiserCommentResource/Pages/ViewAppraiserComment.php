<?php

namespace App\Filament\Appraiser\Resources\AppraiserCommentResource\Pages;

use App\Filament\Appraiser\Resources\AppraiserCommentResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewAppraiserComment extends ViewRecord
{
    protected static string $resource = AppraiserCommentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
