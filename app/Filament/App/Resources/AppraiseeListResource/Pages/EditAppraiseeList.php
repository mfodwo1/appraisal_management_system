<?php

namespace App\Filament\App\Resources\AppraiseeListResource\Pages;

use App\Filament\App\Resources\AppraiseeListResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAppraiseeList extends EditRecord
{
    protected static string $resource = AppraiseeListResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function getFooterWidgets(): array
    {
        return [
            AppraiseeListResource\Widgets\AppraiseeListWidget::class,
        ];
    }
}
