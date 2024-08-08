<?php

namespace App\Filament\Resources;

use App\Filament\Resources\KelompokTaniResource\Pages;
use App\Filament\Resources\KelompokTaniResource\RelationManagers;
use App\Models\KelompokTani;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class KelompokTaniResource extends Resource
{
    protected static ?string $model = KelompokTani::class;

    protected static ?string $navigationIcon = 'icon-kelompok-tani';

    protected static ?string $navigationLabel = 'Kelompok Tani';

    protected static ?string $navigationGroup = 'Data Sekunder';

    protected static ?int $navigationSort = 40;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('blok')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('jabatan')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama')->sortable()->searchable()->toggleable(),
                Tables\Columns\TextColumn::make('blok')->sortable()->searchable()->toggleable(),
                Tables\Columns\TextColumn::make('jabatan')->sortable()->searchable()->toggleable(),
                Tables\Columns\TextColumn::make('created_at')->dateTime()->sortable()->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')->dateTime()->sortable()->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListKelompokTanis::route('/'),
            'create' => Pages\CreateKelompokTani::route('/create'),
            'edit' => Pages\EditKelompokTani::route('/{record}/edit'),
        ];
    }

    public static function getModelLabel(): string
    {
        return __('Kelompok Tani');
    }

    public static function getPluralModelLabel(): string
    {
        return __('Kelompok Tani');
    }
}
