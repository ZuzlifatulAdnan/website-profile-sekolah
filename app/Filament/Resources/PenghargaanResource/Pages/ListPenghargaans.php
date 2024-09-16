<?php

namespace App\Filament\Resources\PenghargaanResource\Pages;

use App\Filament\Resources\PenghargaanResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPenghargaans extends ListRecords
{
    protected static string $resource = PenghargaanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
