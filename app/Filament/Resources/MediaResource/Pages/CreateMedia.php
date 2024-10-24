<?php

namespace App\Filament\Resources\MediaResource\Pages;

use App\Filament\Resources\MediaResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateMedia extends CreateRecord
{
    protected static string $resource = MediaResource::class;
     // Override view agar bisa custom JavaScript
    //  protected function getView(): string
    //  {
    //      return 'filament.pages.media.create-media';
    //  }
}
