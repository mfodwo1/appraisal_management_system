<?php

namespace App\Filament\Appraiser\Resources\CurrentPerformanceResource\Pages;

use App\Filament\Appraiser\Resources\CurrentPerformanceResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateCurrentPerformance extends CreateRecord
{
    protected static string $resource = CurrentPerformanceResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['appraiser_id'] = auth()->id();

        return $data;
    }

    protected function getFooterWidgets(): array
    {
        return [

        ];
    }
}
