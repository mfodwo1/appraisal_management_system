<?php

namespace App\Filament\App\Resources\AppraiseeCommentResource\Pages;

use App\Filament\App\Resources\AppraiseeCommentResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAppraiseeComment extends EditRecord
{
    protected static string $resource = AppraiseeCommentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
