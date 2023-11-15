<?php

namespace App\Filament\App\Resources\AppraiseeCommentResource\Pages;

use App\Filament\App\Resources\AppraiseeCommentResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAppraiseeComments extends ListRecords
{
    protected static string $resource = AppraiseeCommentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
