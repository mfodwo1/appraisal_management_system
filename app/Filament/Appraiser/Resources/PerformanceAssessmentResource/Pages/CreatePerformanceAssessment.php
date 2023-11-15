<?php

namespace App\Filament\Appraiser\Resources\PerformanceAssessmentResource\Pages;

use App\Filament\Appraiser\Resources\PerformanceAssessmentResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreatePerformanceAssessment extends CreateRecord
{
    protected static string $resource = PerformanceAssessmentResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['appraiser_id'] = auth()->id();
        return $data;
    }
}
