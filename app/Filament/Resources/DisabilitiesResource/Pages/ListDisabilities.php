<?php

namespace App\Filament\Resources\DisabilitiesResource\Pages;

use App\Filament\Resources\DisabilitiesResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDisabilities extends ListRecords
{
    protected static string $resource = DisabilitiesResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
