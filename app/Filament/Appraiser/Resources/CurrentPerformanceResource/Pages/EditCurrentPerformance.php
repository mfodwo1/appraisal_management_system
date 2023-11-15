<?php

namespace App\Filament\Appraiser\Resources\CurrentPerformanceResource\Pages;

use App\Filament\Appraiser\Resources\CurrentPerformanceResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCurrentPerformance extends EditRecord
{
    protected static string $resource = CurrentPerformanceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
        ];
    }

    protected function getFooterWidgets(): array
    {
        return [

            CurrentPerformanceResource\Widgets\CurrentPerformanceWidget::class,
        ];
    }

}
