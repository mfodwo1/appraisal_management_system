<?php

namespace App\Filament\Appraiser\Resources\PerformanceAndDevelopmentPlanResource\Pages;

use App\Filament\Appraiser\Resources\PerformanceAndDevelopmentPlanResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPerformanceAndDevelopmentPlan extends EditRecord
{
    protected static string $resource = PerformanceAndDevelopmentPlanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
