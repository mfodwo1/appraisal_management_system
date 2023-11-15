<?php

namespace App\Filament\App\Resources\AppraiseeCommentResource\Pages;

use App\Filament\App\Resources\AppraiseeCommentResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewAppraiseeComment extends ViewRecord
{
    protected static string $resource = AppraiseeCommentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
