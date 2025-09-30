<?php

namespace App\Filament\Resources\ProduksiRotaries\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ProduksiRotariesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('produksiRotaryLahans.target.deskripsi')
                    ->label('Target')
                    ->listWithLineBreaks()   // tampilkan banyak target per baris
                    ->bulleted()             // opsional, kasih bullet list
                    ->searchable(),
                // Kolom tanggal produksi
                TextColumn::make('tanggal_produksi')
                    ->label('Tanggal Produksi')
                    ->date('d F Y') // Format: 30 September 2025
                    ->sortable()
                    ->searchable(),

                // Jam mulai mesin
                TextColumn::make('jam_mulai_mesin')
                    ->label('Jam Mulai')
                    ->formatStateUsing(fn($state) => $state ? substr($state, 0, 5) : null)
                    ->sortable(),

                // Jam selesai mesin
                TextColumn::make('jam_selesai_mesin')
                    ->label('Jam Selesai')
                    ->formatStateUsing(fn($state) => $state ? substr($state, 0, 5) : null)
                    ->sortable(),

                // Status data
                TextColumn::make('status_data')
                    ->label('Status')
                    ->formatStateUsing(fn($state) => match ($state) {
                        0 => 'Diproduksi',
                        1 => 'Disetujui',
                        default => 'Tidak diketahui',
                    })
                    ->icon(fn($state) => match ($state) {
                        0 => 'heroicon-o-adjustments-horizontal',   // ikon gear
                        1 => 'heroicon-o-check-circle',  // ikon checklist
                        default => 'heroicon-o-question-mark-circle',
                    })
                    ->color(fn($state) => match ($state) {
                        0 => 'warning',
                        1 => 'success',
                        default => 'gray',
                    })
                    ->badge(), // supaya tetap styled seperti badge

                // Kendala
                TextColumn::make('kendala')
                    ->label('Kendala')
                    ->limit(30) // batasi panjang teks biar rapi
                    ->toggleable(isToggledHiddenByDefault: true), // bisa disembunyikan
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
