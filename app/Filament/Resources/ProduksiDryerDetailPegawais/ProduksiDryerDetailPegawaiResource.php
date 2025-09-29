<?php

namespace App\Filament\Resources\ProduksiDryerDetailPegawais;

use App\Filament\Resources\ProduksiDryerDetailPegawais\Pages\CreateProduksiDryerDetailPegawai;
use App\Filament\Resources\ProduksiDryerDetailPegawais\Pages\EditProduksiDryerDetailPegawai;
use App\Filament\Resources\ProduksiDryerDetailPegawais\Pages\ListProduksiDryerDetailPegawais;
use App\Filament\Resources\ProduksiDryerDetailPegawais\Schemas\ProduksiDryerDetailPegawaiForm;
use App\Filament\Resources\ProduksiDryerDetailPegawais\Tables\ProduksiDryerDetailPegawaisTable;
use App\Models\ProduksiDryerDetailPegawai;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class ProduksiDryerDetailPegawaiResource extends Resource
{
    public static function shouldRegisterNavigation(): bool
    {
        return false;
    }
    protected static ?string $model = ProduksiDryerDetailPegawai::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'keterangan';

    public static function form(Schema $schema): Schema
    {
        return ProduksiDryerDetailPegawaiForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ProduksiDryerDetailPegawaisTable::configure($table);
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
            'index' => ListProduksiDryerDetailPegawais::route('/'),
            'create' => CreateProduksiDryerDetailPegawai::route('/create'),
            'edit' => EditProduksiDryerDetailPegawai::route('/{record}/edit'),
        ];
    }
}
