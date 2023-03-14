<?php

namespace App\Filament\Resources\DisabilitiesResource\Pages;

use App\Filament\Resources\DisabilitiesResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDisabilities extends EditRecord
{
    protected static string $resource = DisabilitiesResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
