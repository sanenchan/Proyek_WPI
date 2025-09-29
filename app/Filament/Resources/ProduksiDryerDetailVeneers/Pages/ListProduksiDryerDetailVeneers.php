<?php

namespace App\Filament\Resources\ProduksiDryerDetailVeneers\Pages;

use App\Filament\Resources\ProduksiDryerDetailVeneers\ProduksiDryerDetailVeneerResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListProduksiDryerDetailVeneers extends ListRecords
{
    protected static string $resource = ProduksiDryerDetailVeneerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
