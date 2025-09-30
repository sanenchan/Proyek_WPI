<?php

namespace App\Filament\Resources\ProduksiRotaries\Schemas;

use Filament\Infolists\Components\RepeatableEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class ProduksiRotaryInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Informasi Produksi')
                    ->schema([
                        Grid::make(2)->schema([
                            TextEntry::make('tanggal_produksi')
                                ->label('Tanggal Produksi')
                                ->date('d F Y'),

                            TextEntry::make('jam_mulai_mesin')
                                ->label('Jam Mulai Mesin'),

                            TextEntry::make('jam_selesai_mesin')
                                ->label('Jam Selesai Mesin'),

                            TextEntry::make('status_data')
                                ->label('Status Data')
                                ->formatStateUsing(fn($state) => $state == 1 ? 'Final' : 'Draft'),
                        ]),
                        TextEntry::make('kendala')
                            ->label('Kendala')
                            ->columnSpanFull(),


                    ])
                    ->columns(2)
                    ->columnSpanFull(),

                // =====================
                // Section 2: Child - Lahan
                // =====================
                Section::make('Data Lahan')
                    ->schema([
                        RepeatableEntry::make('produksiRotaryLahans')
                            ->schema([
                                TextEntry::make('lahan.kode_nama')->label('Lahan'),
                                TextEntry::make('target.deskripsi')->label('Target'),
                                TextEntry::make('jumlah_batang')->label('Jumlah Batang'),
                                TextEntry::make('hasilkw1')->label('Hasil KW1'),
                                TextEntry::make('hasilkw2')->label('Hasil KW2'),
                                TextEntry::make('hasilkw3')->label('Hasil KW3'),
                                TextEntry::make('hasilkw4')->label('Hasil KW4'),
                            ])
                            ->columns(3)
                            ->columnSpanFull(),
                    ]),

                // =====================
                // Section 3: Child - Pegawai
                // =====================
                Section::make('Data Pegawai')
                    ->schema([
                        RepeatableEntry::make('produksiRotaryPegawais')
                            ->schema([
                                TextEntry::make('pegawai.nama_pegawai')->label('Pegawai'),
                                TextEntry::make('jam_mulai')->label('Jam Mulai'),
                                TextEntry::make('jam_selesai')->label('Jam Selesai'),
                                TextEntry::make('potongan_target')->label('Potongan Target'),
                            ])
                            ->columns(3)->columnSpanFull(),
                    ]),

            ]);
    }
}
