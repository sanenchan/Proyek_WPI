<?php

namespace App\Filament\Resources\ProduksiDryers\Pages;

use App\Filament\Resources\ProduksiDryers\ProduksiDryerResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListProduksiDryers extends ListRecords
{
    protected static string $resource = ProduksiDryerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
