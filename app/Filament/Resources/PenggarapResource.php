<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PenggarapResource\Pages;
use App\Filament\Resources\PenggarapResource\RelationManagers;
use App\Models\Penggarap;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PenggarapResource extends Resource
{
    protected static ?string $model = Penggarap::class;

    protected static ?string $navigationIcon = 'icon-penggarap';

    protected static ?string $navigationLabel = 'Penggarap';

    protected static ?string $navigationGroup = 'Data Sekunder';

    protected static ?int $navigationSort = 20;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('nik')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextArea::make('alamat')
                    ->required()
                    ->maxLength(65535),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama')->sortable()->searchable()->toggleable(),
                Tables\Columns\TextColumn::make('nik')->sortable()->searchable()->toggleable(),
                Tables\Columns\TextColumn::make('alamat')->sortable()->searchable()->toggleable(isToggledHiddenByDefault: true),
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
            'index' => Pages\ListPenggaraps::route('/'),
            'create' => Pages\CreatePenggarap::route('/create'),
            'edit' => Pages\EditPenggarap::route('/{record}/edit'),
        ];
    }

    public static function getModelLabel(): string
    {
        return __('Penggarap');
    }

    public static function getPluralModelLabel(): string
    {
        return __('Penggarap');
    }
}
