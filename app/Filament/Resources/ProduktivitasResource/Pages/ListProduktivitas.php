<?php

namespace App\Filament\Resources\ProduktivitasResource\Pages;

use App\Filament\Resources\ProduktivitasResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListProduktivitas extends ListRecords
{
    protected static string $resource = ProduktivitasResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
