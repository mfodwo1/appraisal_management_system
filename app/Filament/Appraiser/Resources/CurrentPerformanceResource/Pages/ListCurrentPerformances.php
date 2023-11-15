<?php

namespace App\Filament\Appraiser\Resources\CurrentPerformanceResource\Pages;

use App\Filament\Appraiser\Resources\CurrentPerformanceResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCurrentPerformances extends ListRecords
{
    protected static string $resource = CurrentPerformanceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
