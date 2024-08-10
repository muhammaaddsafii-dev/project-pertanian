<?php

namespace App\Filament\Resources\PertanianResource\Pages;

use App\Filament\Resources\PertanianResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Tables;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PertanianExport;

class ListPertanians extends ListRecords
{
    protected static string $resource = PertanianResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
            Actions\Action::make('export')
                ->label('Export')
                ->icon('heroicon-o-cloud-arrow-down')
                ->action('exportToExcel'),
        ];
    }

    public function exportToExcel()
    {
        return Excel::download(new PertanianExport, 'pertanian.xlsx');
    }
}
