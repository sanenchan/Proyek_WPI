<?php

namespace App\Filament\Resources\ProduksiDryerDetailPegawais\Pages;

use App\Filament\Resources\ProduksiDryerDetailPegawais\ProduksiDryerDetailPegawaiResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListProduksiDryerDetailPegawais extends ListRecords
{
    protected static string $resource = ProduksiDryerDetailPegawaiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
