<?php

namespace App\Filament\Appraiser\Resources\PerformanceAssessmentResource\Pages;

use App\Filament\Appraiser\Resources\PerformanceAssessmentResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPerformanceAssessments extends ListRecords
{
    protected static string $resource = PerformanceAssessmentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
