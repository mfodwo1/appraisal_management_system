<?php

namespace App\Filament\Appraiser\Resources\AppraiserCommentResource\Pages;

use App\Filament\Appraiser\Resources\AppraiserCommentResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAppraiserComments extends ListRecords
{
    protected static string $resource = AppraiserCommentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
