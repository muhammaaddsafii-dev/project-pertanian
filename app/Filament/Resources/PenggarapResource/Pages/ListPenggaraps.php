<?php

namespace App\Filament\Resources\PenggarapResource\Pages;

use App\Filament\Resources\PenggarapResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPenggaraps extends ListRecords
{
    protected static string $resource = PenggarapResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
