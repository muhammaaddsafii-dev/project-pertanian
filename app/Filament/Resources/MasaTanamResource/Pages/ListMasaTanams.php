<?php

namespace App\Filament\Resources\MasaTanamResource\Pages;

use App\Filament\Resources\MasaTanamResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMasaTanams extends ListRecords
{
    protected static string $resource = MasaTanamResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
