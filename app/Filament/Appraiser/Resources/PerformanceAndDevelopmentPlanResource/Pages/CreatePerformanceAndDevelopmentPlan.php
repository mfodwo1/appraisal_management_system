<?php

namespace App\Filament\Appraiser\Resources\PerformanceAndDevelopmentPlanResource\Pages;

use App\Filament\Appraiser\Resources\PerformanceAndDevelopmentPlanResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreatePerformanceAndDevelopmentPlan extends CreateRecord
{
    protected static string $resource = PerformanceAndDevelopmentPlanResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['appraiser_id'] = auth()->id();

        return $data;
    }
}
