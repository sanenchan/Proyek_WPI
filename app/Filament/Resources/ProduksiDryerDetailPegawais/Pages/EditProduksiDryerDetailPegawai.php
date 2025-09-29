<?php

namespace App\Filament\Resources\ProduksiDryerDetailPegawais\Pages;

use App\Filament\Resources\ProduksiDryerDetailPegawais\ProduksiDryerDetailPegawaiResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditProduksiDryerDetailPegawai extends EditRecord
{
    protected static string $resource = ProduksiDryerDetailPegawaiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
