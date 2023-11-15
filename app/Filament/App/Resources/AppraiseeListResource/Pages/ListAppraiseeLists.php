<?php

namespace App\Filament\App\Resources\AppraiseeListResource\Pages;

use App\Filament\App\Resources\AppraiseeListResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAppraiseeLists extends ListRecords
{
    protected static string $resource = AppraiseeListResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
