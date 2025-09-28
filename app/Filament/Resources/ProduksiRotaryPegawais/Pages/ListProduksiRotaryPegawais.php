<?php

namespace App\Filament\Resources\ProduksiRotaryPegawais\Pages;

use App\Filament\Resources\ProduksiRotaryPegawais\ProduksiRotaryPegawaiResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListProduksiRotaryPegawais extends ListRecords
{
    protected static string $resource = ProduksiRotaryPegawaiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
