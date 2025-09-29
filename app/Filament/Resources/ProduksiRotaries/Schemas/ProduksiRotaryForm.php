<?php

namespace App\Filament\Resources\ProduksiRotaries\Schemas;

use App\Models\Lahan;
use App\Models\Target;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Filament\Actions\Action;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\TimePicker;
use Filament\Schemas\Components\Form;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class ProduksiRotaryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->schema([
            // =====================
            // Section 1: Parent
            // =====================
            Section::make('Informasi Produksi')
                ->schema([
                    DatePicker::make('tanggal_produksi')
                        ->label('Tanggal Produksi')
                        ->required()
                        ->default(fn() => Carbon::yesterday())
                        ->displayFormat('j F Y') // untuk tampilan, misal 1 Januari 2025
                        ->native(false),         // penting, supaya pakai flatpickr (bukan native browser)

                    // Jam mulai mesin
                    Select::make('jam_mulai_mesin')
                        ->label('Jam Mulai Mesin')
                        ->options(self::timeOptions())
                        ->default('06:00') // Default: 06:00 (pagi)
                        ->required()
                        ->searchable()
                        ->dehydrateStateUsing(fn($state) => $state ? $state . ':00' : null)
                        ->formatStateUsing(fn($state) => $state ? substr($state, 0, 5) : null), // Tampilkan hanya HH:MM,,

                    // Jam selesai mesin
                    Select::make('jam_selesai_mesin')
                        ->label('Jam Selesai Mesin')
                        ->options(self::timeOptions())
                        ->default('17:00') // Default: 06:00 (pagi)
                        ->required()
                        ->searchable()
                        ->dehydrateStateUsing(fn($state) => $state ? $state . ':00' : null)
                        ->formatStateUsing(fn($state) => $state ? substr($state, 0, 5) : null), // Tampilkan hanya HH:MM,,

                    Select::make('status_data')
                        ->label('Status Data')
                        ->options([
                            0 => 'Draft',
                            1 => 'Final',
                        ])
                        ->default(0)
                        ->required(),

                    Textarea::make('kendala')
                        ->label('Kendala')
                        ->nullable()
                        ->columnSpanFull(),


                ])
                ->columns(2)
                ->columnSpanFull(),

            // =====================
            // Section 2: Child - Lahan
            // =====================
            Section::make('Data Lahan')
                ->schema([
                    Repeater::make('produksiRotaryLahans')
                        ->label('Daftar Lahan')
                        ->relationship()
                        ->schema([


                            Select::make('id_lahan')
                                ->label('Lahan')
                                ->options(Lahan::all()->pluck('kode_nama', 'id_lahan')->toArray())
                                ->searchable()
                                ->required(),

                            Select::make('id_target')
                                ->label('Target')
                                ->options(Target::with(['mesin', 'ukuranModel', 'jenisKayu'])->get()->pluck('deskripsi', 'id_target'))
                                ->searchable()
                                ->required(),

                            TextInput::make('jumlah_batang')
                                ->label('Jumlah Batang')
                                ->numeric()
                                ->default(0),

                            TextInput::make('hasilkw1')
                                ->label('Hasil KW1')
                                ->numeric()
                                ->default(0),

                            TextInput::make('hasilkw2')
                                ->label('Hasil KW2')
                                ->numeric()
                                ->default(0),

                            TextInput::make('hasilkw3')
                                ->label('Hasil KW3')
                                ->numeric()
                                ->default(0),

                            TextInput::make('hasilkw4')
                                ->label('Hasil KW4')
                                ->numeric()
                                ->default(0),

                            TextInput::make('total')
                                ->label('total')
                                ->numeric()
                                ->default(0),

                            TextInput::make('kubikasi')
                                ->label('Kubikasi')
                                ->numeric()
                                ->default(0),

                            TextInput::make('target_produksi')
                                ->label('Target Produksi')
                                ->numeric()
                                ->default(0),

                            TextInput::make('capaian_produksi')
                                ->label('Capaian Produksi')
                                ->numeric()
                                ->default(0),

                            TextInput::make('status_produksi')
                                ->label('Status Produksi')
                                ->numeric()
                                ->default(0),

                            TextInput::make('potongan_target')
                                ->label('Potongan Target')
                                ->numeric()
                                ->default(0),
                        ])
                        ->columns(2)

                        ->columnSpanFull(),
                ]),

            // =====================
            // Section 3: Child - Pegawai
            // =====================
            Section::make('Data Pegawai')
                ->schema([
                    Repeater::make('produksiRotaryPegawais')
                        ->label('Daftar Pegawai')
                        ->relationship()
                        ->schema([
                            Select::make('id_pegawai')
                                ->relationship('pegawai', 'nama_pegawai')
                                ->label('Pegawai')
                                ->required(),

                            Select::make('jam_mulai')
                                ->label('Jam Mulai')
                                ->options(self::timeOptions()) // misalnya ['06:00' => '06:00', dst.]
                                ->default('06:00')
                                ->required()
                                ->searchable()
                                ->dehydrateStateUsing(fn($state) => $state ? $state . ':00' : null) // Simpan ke DB dengan detik
                                ->formatStateUsing(fn($state) => $state ? substr($state, 0, 5) : null), // Tampilkan hanya HH:MM,

                            Select::make('jam_selesai')
                                ->label('Jam Selesai')
                                ->options(self::timeOptions())
                                ->default('17:00') // Default: 17:00 (sore)
                                ->required()
                                ->searchable()
                                ->dehydrateStateUsing(fn($state) => $state ? $state . ':00' : null)
                                ->formatStateUsing(fn($state) => $state ? substr($state, 0, 5) : null), // Tampilkan hanya HH:MM,

                            TextInput::make('potongan_target')
                                ->label('Potongan Target')
                                ->numeric()
                                ->default(0),
                        ])
                        ->columns(3)
                        ->columnSpanFull(),
                ]),

            //aksi
//akhir aksi

        ]);

    }

    public static function timeOptions(): array
    {
        return collect(CarbonPeriod::create('00:00', '1 hour', '23:00')->toArray())
            ->mapWithKeys(fn($time) => [
                $time->format('H:i') => $time->format('H.i'), // Key: H:i (e.g., '00:00'), Value: H.i (e.g., '0.0') for display
            ])
            ->toArray();
    }

}
