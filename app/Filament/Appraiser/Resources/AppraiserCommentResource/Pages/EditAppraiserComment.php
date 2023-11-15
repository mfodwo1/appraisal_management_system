<?php

namespace App\Filament\Appraiser\Resources\AppraiserCommentResource\Pages;

use App\Filament\Appraiser\Resources\AppraiserCommentResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAppraiserComment extends EditRecord
{
    protected static string $resource = AppraiserCommentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
