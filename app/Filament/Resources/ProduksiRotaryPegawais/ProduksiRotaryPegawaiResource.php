<?php

namespace App\Filament\Resources\ProduksiRotaryPegawais;

use App\Filament\Resources\ProduksiRotaryPegawais\Pages\CreateProduksiRotaryPegawai;
use App\Filament\Resources\ProduksiRotaryPegawais\Pages\EditProduksiRotaryPegawai;
use App\Filament\Resources\ProduksiRotaryPegawais\Pages\ListProduksiRotaryPegawais;
use App\Filament\Resources\ProduksiRotaryPegawais\Schemas\ProduksiRotaryPegawaiForm;
use App\Filament\Resources\ProduksiRotaryPegawais\Tables\ProduksiRotaryPegawaisTable;
use App\Models\ProduksiRotaryPegawai;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class ProduksiRotaryPegawaiResource extends Resource
{
    protected static ?string $model = ProduksiRotaryPegawai::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'potongan_target';

    public static function form(Schema $schema): Schema
    {
        return ProduksiRotaryPegawaiForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ProduksiRotaryPegawaisTable::configure($table);
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
            'index' => ListProduksiRotaryPegawais::route('/'),
            'create' => CreateProduksiRotaryPegawai::route('/create'),
            'edit' => EditProduksiRotaryPegawai::route('/{record}/edit'),
        ];
    }
}
