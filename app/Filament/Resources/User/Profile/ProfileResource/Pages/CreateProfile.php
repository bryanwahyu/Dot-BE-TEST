<?php

namespace App\Filament\Resources\User\Profile\ProfileResource\Pages;

use App\Filament\Resources\User\Profile\ProfileResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateProfile extends CreateRecord
{
    protected static string $resource = ProfileResource::class;
}
