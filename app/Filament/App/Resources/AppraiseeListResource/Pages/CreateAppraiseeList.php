<?php

namespace App\Filament\App\Resources\AppraiseeListResource\Pages;

use App\Filament\App\Resources\AppraiseeListResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateAppraiseeList extends CreateRecord
{
    protected static string $resource = AppraiseeListResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['appraisee_list_id'] = auth()->id();

        return $data;
    }
}
