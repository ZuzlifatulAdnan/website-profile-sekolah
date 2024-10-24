<?php

namespace App\Filament\Resources\VidioResource\Pages;

use App\Filament\Resources\VidioResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListVidios extends ListRecords
{
    protected static string $resource = VidioResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
