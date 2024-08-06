<?php

namespace App\Filament\Resources\ERDKKResource\Pages;

use App\Filament\Resources\ERDKKResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListERDKKS extends ListRecords
{
    protected static string $resource = ERDKKResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
