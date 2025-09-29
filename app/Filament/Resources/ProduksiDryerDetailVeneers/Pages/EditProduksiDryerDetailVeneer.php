<?php

namespace App\Filament\Resources\ProduksiDryerDetailVeneers\Pages;

use App\Filament\Resources\ProduksiDryerDetailVeneers\ProduksiDryerDetailVeneerResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditProduksiDryerDetailVeneer extends EditRecord
{
    protected static string $resource = ProduksiDryerDetailVeneerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
