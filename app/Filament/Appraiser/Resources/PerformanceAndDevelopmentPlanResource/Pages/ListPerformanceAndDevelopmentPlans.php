<?php

namespace App\Filament\Appraiser\Resources\PerformanceAndDevelopmentPlanResource\Pages;

use App\Filament\Appraiser\Resources\PerformanceAndDevelopmentPlanResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPerformanceAndDevelopmentPlans extends ListRecords
{
    protected static string $resource = PerformanceAndDevelopmentPlanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
