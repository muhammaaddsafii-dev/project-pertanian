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
                Forms\Components\TextInput::make('dnop')
                    ->maxLength(255),
                Forms\Components\Select::make('desa_id')
                    ->relationship('desa', 'nama')
                    ->required(),
                Forms\Components\Select::make('kelompok_tani_id')
                    ->relationship('kelompokTani', 'nama')
                    ->required(),
                Forms\Components\Select::make('erdkk_id')
                    ->relationship('erdkk', 'nama')
                    ->required(),
                Forms\Components\Select::make('pemilik_id')
                    ->relationship('pemilik', 'nama')
                    ->required(),
                Forms\Components\Select::make('penggarap_id')
                    ->relationship('penggarap', 'nama')
                    ->required(),
                Forms\Components\Select::make('penyewa_id')
                    ->relationship('penyewa', 'nama')
                    ->required(),
                Forms\Components\TextInput::make('komoditas_1')
                    ->maxLength(255),
                Forms\Components\TextInput::make('komoditas_2')
                    ->maxLength(255),
                Forms\Components\TextInput::make('komoditas_3')
                    ->maxLength(255),
                Forms\Components\TextInput::make('masa_tanam_1')
                    ->maxLength(255),
                Forms\Components\TextInput::make('masa_tanam_2')
                    ->maxLength(255),
                Forms\Components\TextInput::make('masa_tanam_3')
                    ->maxLength(255),
                Forms\Components\TextInput::make('produktivitas_1')
                    ->maxLength(255),
                Forms\Components\TextInput::make('produktivitas_2')
                    ->maxLength(255),
                Forms\Components\TextInput::make('produktivitas_3')
                    ->maxLength(255),
                Forms\Components\TextInput::make('jumlah_ptk')
                    ->maxLength(255),
                Forms\Components\TextInput::make('subsidi_pupuk')
                    ->maxLength(255),
                Forms\Components\TextInput::make('alat_sistem_tanam')
                    ->maxLength(255),
                Forms\Components\TextInput::make('sumber_air')
                    ->maxLength(255),
                Forms\Components\TextInput::make('nama_daerah')
                    ->maxLength(255),
                Forms\Components\TextInput::make('luas')
                    ->numeric()
                    ->step(0.01),
                Forms\Components\TextInput::make('shape_leng')
                    ->numeric()
                    ->step(0.000000000000001),
                Forms\Components\TextInput::make('shape_area')
                    ->numeric()
                    ->step(0.000000000000001),
                // Note: 'geom' field might need special handling
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('dnop')->sortable()->searchable()->toggleable(),
                Tables\Columns\TextColumn::make('pemilik.nama')->sortable()->searchable()->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('penggarap.nama')->sortable()->searchable()->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('desa.nama')->sortable()->searchable()->toggleable(),
                Tables\Columns\TextColumn::make('desa.kecamatan.nama')->label('Kecamatan')->sortable()->searchable()->toggleable(),
                Tables\Columns\TextColumn::make('kelompokTani.nama')->sortable()->searchable()->toggleable(),
                Tables\Columns\TextColumn::make('erdkk.nama')->sortable()->searchable()->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('penyewa.nama')->sortable()->searchable()->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('komoditas_1')->sortable()->searchable()->toggleable(),
                Tables\Columns\TextColumn::make('komoditas_2')->sortable()->searchable()->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('komoditas_3')->sortable()->searchable()->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('masa_tanam_1')->sortable()->searchable()->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('masa_tanam_2')->sortable()->searchable()->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('masa_tanam_3')->sortable()->searchable()->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('produktivitas_1')->sortable()->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('produktivitas_2')->sortable()->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('produktivitas_3')->sortable()->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('jumlah_ptk')->sortable()->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('subsidi_pupuk')->sortable()->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('alat_sistem_tanam')->sortable()->searchable()->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('sumber_air')->sortable()->searchable()->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('nama_daerah')->sortable()->searchable()->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('luas')->sortable()->toggleable(),
                Tables\Columns\TextColumn::make('shape_leng')->sortable()->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('shape_area')->sortable()->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()->sortable()->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()->sortable()->toggleable(isToggledHiddenByDefault: true),
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
            'index' => Pages\ListPertanians::route('/'),
            'create' => Pages\CreatePertanian::route('/create'),
            'edit' => Pages\EditPertanian::route('/{record}/edit'),
        ];
    }

    public static function getModelLabel(): string
    {
        return __('Pertanian');
    }

    public static function getPluralModelLabel(): string
    {
        return __('Pertanian');
    }
}
