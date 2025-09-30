<?php

namespace App\Filament\Resources\ProduksiDryers\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ProduksiDryersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                //
                TextColumn::make('tanggal_produksi')
                    ->label('Tanggal Produksi')
                    ->date('d F Y')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('mesin.nama_mesin')
                    ->label('Mesin')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('jumlah_pekerja')
                    ->label('Jumlah Pekerja')
                    ->numeric()
                    ->sortable(),

                TextColumn::make('kendala')
                    ->label('Kendala')
                    ->limit(50) // biar nggak kepanjangan di tabel
                    ->wrap(),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
