<?php

namespace App\Filament\Resources\ProduksiDryers\Pages;

use App\Filament\Resources\ProduksiDryers\ProduksiDryerResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewProduksiDryer extends ViewRecord
{
    protected static string $resource = ProduksiDryerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
