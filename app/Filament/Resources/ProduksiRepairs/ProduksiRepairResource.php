<?php

namespace App\Filament\Resources\ProduksiRepairs;

use App\Filament\Resources\ProduksiRepairs\Pages\CreateProduksiRepair;
use App\Filament\Resources\ProduksiRepairs\Pages\EditProduksiRepair;
use App\Filament\Resources\ProduksiRepairs\Pages\ListProduksiRepairs;
use App\Filament\Resources\ProduksiRepairs\Pages\ViewProduksiRepair;
use App\Filament\Resources\ProduksiRepairs\Schemas\ProduksiRepairForm;
use App\Filament\Resources\ProduksiRepairs\Schemas\ProduksiRepairInfolist;
use App\Filament\Resources\ProduksiRepairs\Tables\ProduksiRepairsTable;
use App\Models\ProduksiRepair;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class ProduksiRepairResource extends Resource
{
    protected static ?string $model = ProduksiRepair::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'y';

    public static function form(Schema $schema): Schema
    {
        return ProduksiRepairForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return ProduksiRepairInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ProduksiRepairsTable::configure($table);
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
            'index' => ListProduksiRepairs::route('/'),
            'create' => CreateProduksiRepair::route('/create'),
            'view' => ViewProduksiRepair::route('/{record}'),
            'edit' => EditProduksiRepair::route('/{record}/edit'),
        ];
    }
}
