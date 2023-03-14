<?php

namespace App\Filament\Resources\Company\Job\JobResource\Pages;

use App\Filament\Resources\Company\Job\JobResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateJob extends CreateRecord
{
    protected static string $resource = JobResource::class;
}
