<?php

namespace App\Filament\Resources\User\Profile\ProfileResource\Pages;

use App\Filament\Resources\User\Profile\ProfileResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditProfile extends EditRecord
{
    protected static string $resource = ProfileResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
