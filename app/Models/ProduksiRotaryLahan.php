<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProduksiRotaryLahan extends Model
{
    use HasFactory;

    protected $table = 'produksi_rotary_lahans';
    protected $primaryKey = 'id_rotary_lahan';

    protected $fillable = [
        'id_target',
        'id_produksi_rotary',
        'id_lahan',
        'jumlah_batang',
        'hasilkw1',
        'hasilkw2',
        'hasilkw3',
        'hasilkw4',
        'total',
        'kubikasi',            // <- posisi sudah dipastikan setelah total
        'target_produksi',
        'capaian_produksi',
        'status_produksi',
        'potongan_target',
    ];

    // Relasi ke induk
    public function produksiRotary()
    {
        return $this->belongsTo(ProduksiRotary::class, 'id_produksi_rotary', 'id_produksi_rotary');
    }

    // Relasi ke lahan
    public function lahan()
    {
        return $this->belongsTo(Lahan::class, 'id_lahan', 'id_lahan');
    }

    // Relasi ke target
    public function target()
    {
    return $this->belongsTo(Target::class, 'id_target', 'id_target');
    }
    
}
