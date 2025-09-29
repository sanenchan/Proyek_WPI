<?php

namespace App\Filament\Resources\ProduksiDryers;

use App\Filament\Resources\ProduksiDryers\Pages\CreateProduksiDryer;
use App\Filament\Resources\ProduksiDryers\Pages\EditProduksiDryer;
use App\Filament\Resources\ProduksiDryers\Pages\ListProduksiDryers;
use App\Filament\Resources\ProduksiDryers\Pages\ViewProduksiDryer;
use App\Filament\Resources\ProduksiDryers\Schemas\ProduksiDryerForm;
use App\Filament\Resources\ProduksiDryers\Schemas\ProduksiDryerInfolist;
use App\Filament\Resources\ProduksiDryers\Tables\ProduksiDryersTable;
use App\Models\ProduksiDryer;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class ProduksiDryerResource extends Resource
{
    public static function getNavigationGroup(): ?string
    {
        return 'Produksi'; // Sama group
    }

    public static function getNavigationLabel(): string
    {
        return 'Produksi Dryer'; // Label submenu
    }
    protected static ?string $model = ProduksiDryer::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'tanggal_produksi';

    public static function form(Schema $schema): Schema
    {
        return ProduksiDryerForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return ProduksiDryerInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ProduksiDryersTable::configure($table);
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
            'index' => ListProduksiDryers::route('/'),
            'create' => CreateProduksiDryer::route('/create'),
            'view' => ViewProduksiDryer::route('/{record}'),
            'edit' => EditProduksiDryer::route('/{record}/edit'),
        ];
    }
}
