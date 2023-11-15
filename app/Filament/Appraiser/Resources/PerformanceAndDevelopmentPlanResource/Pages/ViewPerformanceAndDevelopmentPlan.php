<?php

namespace App\Filament\Appraiser\Resources\PerformanceAndDevelopmentPlanResource\Pages;

use App\Filament\Appraiser\Resources\PerformanceAndDevelopmentPlanResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewPerformanceAndDevelopmentPlan extends ViewRecord
{
    protected static string $resource = PerformanceAndDevelopmentPlanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
