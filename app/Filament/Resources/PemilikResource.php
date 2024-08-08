<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PemilikResource\Pages;
use App\Filament\Resources\PemilikResource\RelationManagers;
use App\Models\Pemilik;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PemilikResource extends Resource
{
    protected static ?string $model = Pemilik::class;

    protected static ?string $navigationIcon = 'icon-pemilik';

    protected static ?string $navigationLabel = 'Pemilik';

    protected static ?string $navigationGroup = 'Data Sekunder';

    protected static ?int $navigationSort = 10;

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
            'index' => Pages\ListPemiliks::route('/'),
            'create' => Pages\CreatePemilik::route('/create'),
            'edit' => Pages\EditPemilik::route('/{record}/edit'),
        ];
    }

    public static function getModelLabel(): string
    {
        return __('Pemilik');
    }

    public static function getPluralModelLabel(): string
    {
        return __('Pemilik');
    }
}
