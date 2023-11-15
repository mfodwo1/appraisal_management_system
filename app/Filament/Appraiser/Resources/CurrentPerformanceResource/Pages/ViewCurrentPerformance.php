<?php

namespace App\Filament\Appraiser\Resources\CurrentPerformanceResource\Pages;

use App\Filament\Appraiser\Resources\CurrentPerformanceResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewCurrentPerformance extends ViewRecord
{
    protected static string $resource = CurrentPerformanceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }

    protected function getFooterWidgets(): array
    {
        return [

            CurrentPerformanceResource\Widgets\CurrentPerformanceWidget::class,
        ];
    }
}
