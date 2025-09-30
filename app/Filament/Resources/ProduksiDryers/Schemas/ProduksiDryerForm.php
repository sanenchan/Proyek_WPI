<?php

namespace App\Filament\Resources\ProduksiDryers\Schemas;

use App\Models\JenisKayu;
use App\Models\Mesin;
use App\Models\Pegawai;
use App\Models\Target;
use App\Models\Ukuran;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Filament\Actions\Action;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\TimePicker;
use Filament\Schemas\Components\Fieldset;
use Filament\Schemas\Components\Form;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class ProduksiDryerForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->schema([
            // =====================
            // Section 1: Data Produksi Dryer
            // =====================
            Section::make('Informasi Produksi Dryer')
                ->schema([
                    DatePicker::make('tanggal_produksi')
                        ->label('Tanggal Produksi')
                        ->required()
                        ->default(fn() => Carbon::yesterday())
                        ->displayFormat('j F Y')
                        ->native(false),

                    Select::make('id_mesin')
                        ->label('Mesin')
                        ->placeholder('Pilih Mesin')
                        ->options(
                            Mesin::where('id_kategori_mesin', 2)
                                ->pluck('nama_mesin', 'id_mesin')
                                ->toArray()
                        )
                        ->searchable()
                        ->required(),

                    TextInput::make('jumlah_pekerja')
                        ->label('Jumlah Pekerja')
                        ->numeric()
                        ->required()
                        ->default("9"),

                    Textarea::make('kendala')
                        ->label('Kendala')
                        ->columnSpanFull(),
                ])
                ->columns(3)
                ->columnSpanFull(),

            // =====================
            // Section 2: Detail Veneer
            // =====================
            Section::make('Data Veneer')
                ->schema([
                    Repeater::make('detailVeneers')
                        ->label('Daftar Veneer')
                        ->relationship()
                        ->schema([
                            Select::make('id_ukuran')
                                ->label('Ukuran (P x L x T)')
                                ->relationship('ukuran', 'id_ukuran')
                                ->getOptionLabelFromRecordUsing(fn(Ukuran $record) => $record->dimensi) // pakai accessor
                                ->required(),
                            Select::make('id_jenis_kayu')
                                ->label('Jenis Kayu')
                                ->relationship('jenisKayu', 'nama_kayu')
                                ->required(),
                            Select::make('jam_mulai_kerja')
                                ->label('Jam Mulai')
                                ->options(self::timeOptions())
                                ->default('06:00') // Default: 17:00 (sore)
                                ->required()
                                ->searchable()
                                ->dehydrateStateUsing(fn($state) => $state ? $state . ':00' : null)
                                ->formatStateUsing(fn($state) => $state ? substr($state, 0, 5) : null), // Tampilkan hanya HH:MM,

                            Select::make('jam_selesai_kerja')
                                ->label('Jam Selesai')
                                ->options(self::timeOptions())
                                ->default('17:00') // Default: 17:00 (sore)
                                ->required()
                                ->searchable()
                                ->dehydrateStateUsing(fn($state) => $state ? $state . ':00' : null)
                                ->formatStateUsing(fn($state) => $state ? substr($state, 0, 5) : null), // Tampilkan hanya HH:MM,

                            Fieldset::make('Veneer Basah')
                                ->schema([
                                    TextInput::make('veneer_basah_kw1')->label('Veneer Basah Kw1')->numeric()->default(0),
                                    TextInput::make('veneer_basah_kw2')->label('Veneer Basah Kw2')->numeric()->default(0),
                                    TextInput::make('veneer_basah_kw3')->label('Veneer Basah Kw3')->numeric()->default(0),
                                    TextInput::make('veneer_basah_kw4')->label('Veneer Basah Kw4')->numeric()->default(0),
                                ])
                                ->columns(4)
                                ->columnSpanFull(),
                            Fieldset::make('Hasil Veneer Kering')
                                ->schema([
                                    TextInput::make('hasil_kw1')->label('Kering Kw1')->numeric()->default(0),
                                    TextInput::make('hasil_kw2')->label('Kering Kw2')->numeric()->default(0),
                                    TextInput::make('hasil_kw3')->label('Kering Kw3')->numeric()->default(0),
                                    TextInput::make('hasil_kw4')->label('Kering Kw4')->numeric()->default(0),
                                ])
                                ->columns(4)
                                ->columnSpanFull(),



                        ])
                        ->columns(4)
                        ->defaultItems(1)

                        ->columnSpanFull(),
                ])
                ->columnSpanFull(),

            // =====================
            // Section 3: Detail Pegawai
            // =====================
            Section::make('Data Pegawai')
                ->schema([
                    Repeater::make('detailPegawais')
                        ->label('Daftar Pegawai')
                        ->relationship()
                        ->schema([
                            Select::make('id_pegawai')
                                ->relationship('pegawai', 'id_pegawai')
                                ->label('Pegawai')
                                ->getOptionLabelFromRecordUsing(fn(Pegawai $record) => $record->kode_nama)
                                ->searchable()
                                ->required(),

                            Select::make('jam_masuk')
                                ->label('Jam Masuk')
                                ->options(self::timeOptions())
                                ->default('06:00') // Default: 17:00 (sore)
                                ->required()
                                ->searchable()
                                ->dehydrateStateUsing(fn($state) => $state ? $state . ':00' : null)
                                ->formatStateUsing(fn($state) => $state ? substr($state, 0, 5) : null), // Tampilkan hanya HH:MM,

                            Select::make('jam_pulang')
                                ->label('Jam Pulang')
                                ->options(self::timeOptions())
                                ->default('17:00') // Default: 17:00 (sore)
                                ->required()
                                ->searchable()
                                ->dehydrateStateUsing(fn($state) => $state ? $state . ':00' : null)
                                ->formatStateUsing(fn($state) => $state ? substr($state, 0, 5) : null), // Tampilkan hanya HH:MM,


                            TextInput::make('keterangan')
                                ->label('Keterangan')
                                ->default("-"),
                        ])
                        ->columns(4)
                        ->defaultItems(9)
                        ->cloneable()
                        ->columnSpanFull(),

                ])->columnSpanFull(),
        ]);
    }

    public static function timeOptions(): array
    {
        return collect(CarbonPeriod::create('00:00', '1 hour', '23:00')->toArray())
            ->mapWithKeys(fn($time) => [
                $time->format('H:i') => $time->format('H.i'),
            ])
            ->toArray();
    }
}
