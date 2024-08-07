<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PertanianResource\Pages;
use App\Filament\Resources\PertanianResource\RelationManagers;
use App\Models\Pertanian;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PertanianResource extends Resource
{
    protected static ?string $model = Pertanian::class;

    protected static ?string $navigationIcon = 'icon-pertanian';

    protected static ?string $navigationLabel = 'Pertanian';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPertanians::route('/'),
            'create' => Pages\CreatePertanian::route('/create'),
            'edit' => Pages\EditPertanian::route('/{record}/edit'),
        ];
    }
}
