<?php

namespace App\Filament\Resources\ProduksiRotaries\Pages;

use App\Filament\Resources\ProduksiRotaries\ProduksiRotaryResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditProduksiRotary extends EditRecord
{
    protected static string $resource = ProduksiRotaryResource::class;
// protected function mutateFormDataBeforeSave(array $data): array
// {
//     if (isset($data['produksiRotaryLahans'])) {
//         foreach ($data['produksiRotaryLahans'] as $i => $lahan) {
//             $total = ($lahan['hasilkw1'] ?? 0)
//                    + ($lahan['hasilkw2'] ?? 0)
//                    + ($lahan['hasilkw3'] ?? 0)
//                    + ($lahan['hasilkw4'] ?? 0);

//             $data['produksiRotaryLahans'][$i]['capaian_produksi'] = $total;
//             $data['produksiRotaryLahans'][$i]['status_produksi'] =
//                 ($lahan['target_produksi'] ?? 0) - $total;
//         }
//     }

//     return $data;
// }
protected function mutateFormDataBeforeCreate(array $data): array
{
    dd('Mutate update jalan!', $data);
    return $data;
}

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
