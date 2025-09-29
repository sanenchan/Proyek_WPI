<?php

namespace App\Filament\Resources\ProduksiDryerDetailVeneers;

use App\Filament\Resources\ProduksiDryerDetailVeneers\Pages\CreateProduksiDryerDetailVeneer;
use App\Filament\Resources\ProduksiDryerDetailVeneers\Pages\EditProduksiDryerDetailVeneer;
use App\Filament\Resources\ProduksiDryerDetailVeneers\Pages\ListProduksiDryerDetailVeneers;
use App\Filament\Resources\ProduksiDryerDetailVeneers\Schemas\ProduksiDryerDetailVeneerForm;
use App\Filament\Resources\ProduksiDryerDetailVeneers\Tables\ProduksiDryerDetailVeneersTable;
use App\Models\ProduksiDryerDetailVeneer;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class ProduksiDryerDetailVeneerResource extends Resource
{
    public static function shouldRegisterNavigation(): bool
    {
        return false;
    }
    protected static ?string $model = ProduksiDryerDetailVeneer::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'total';

    public static function form(Schema $schema): Schema
    {
        return ProduksiDryerDetailVeneerForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ProduksiDryerDetailVeneersTable::configure($table);
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
            'index' => ListProduksiDryerDetailVeneers::route('/'),
            'create' => CreateProduksiDryerDetailVeneer::route('/create'),
            'edit' => EditProduksiDryerDetailVeneer::route('/{record}/edit'),
        ];
    }
}
