<?php

namespace App\Filament\Resources\ProduksiRotaries\Pages;

use App\Filament\Resources\ProduksiRotaries\ProduksiRotaryResource;
use Filament\Resources\Pages\CreateRecord;

class CreateProduksiRotary extends CreateRecord
{
    protected static string $resource = ProduksiRotaryResource::class;
    //  protected function mutateFormDataBeforeCreate(array $data): array
    // {
    //     if (isset($data['produksiRotaryLahans'])) {
    //         foreach ($data['produksiRotaryLahans'] as $i => $lahan) {
    //             $total = ($lahan['hasilkw1'] ?? 0)
    //                    + ($lahan['hasilkw2'] ?? 0)
    //                    + ($lahan['hasilkw3'] ?? 0)
    //                    + ($lahan['hasilkw4'] ?? 0);

    //             // isi capaian_produksi
    //             $data['produksiRotaryLahans'][$i]['capaian_produksi'] = $total;

    //             // misalnya juga hitung status_produksi otomatis
    //             $data['produksiRotaryLahans'][$i]['status_produksi'] =
    //                 ($lahan['target_produksi'] ?? 0) - $total;
    //         }
    //     }

    //     return $data;
    // }
//     protected function mutateFormDataBeforeCreate(array $data): array
// {
//     dd('Mutate Create jalan!', $data);
//     return $data;
// }


}
