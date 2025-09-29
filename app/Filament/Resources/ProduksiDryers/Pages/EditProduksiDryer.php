<?php

namespace App\Filament\Resources\ProduksiDryers\Pages;

use App\Filament\Resources\ProduksiDryers\ProduksiDryerResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditProduksiDryer extends EditRecord
{
    protected static string $resource = ProduksiDryerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
