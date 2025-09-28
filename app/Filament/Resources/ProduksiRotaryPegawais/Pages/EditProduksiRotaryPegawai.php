<?php

namespace App\Filament\Resources\ProduksiRotaryPegawais\Pages;

use App\Filament\Resources\ProduksiRotaryPegawais\ProduksiRotaryPegawaiResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditProduksiRotaryPegawai extends EditRecord
{
    protected static string $resource = ProduksiRotaryPegawaiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
