<?php

namespace App\Filament\Resources\Motorcycles\Tables;

use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\SelectColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Table;

class MotorcyclesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('機車名稱')
                    ->searchable()
                    ->sortable()
                    ->weight('bold'),

                TextColumn::make('model')
                    ->label('型號')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('license_plate')
                    ->label('車牌號碼')
                    ->searchable()
                    ->copyable(),

                TextColumn::make('store.name')
                    ->label('所屬商店')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('price')
                    ->label('租金')
                    ->money('TWD')
                    ->sortable(),

                SelectColumn::make('status')
                    ->label('狀態')
                    ->options([
                        'available' => '可出租',
                        'rented' => '已出租',
                        'maintenance' => '維修中',
                        'pending_checkout' => '待結帳',
                    ])
                    ->sortable(),

                IconColumn::make('is_active')
                    ->label('啟用狀態')
                    ->boolean()
                    ->trueIcon('heroicon-s-check-circle')
                    ->falseIcon('heroicon-s-x-circle')
                    ->trueColor('success')
                    ->falseColor('danger'),

                TextColumn::make('created_at')
                    ->label('建立時間')
                    ->dateTime('Y-m-d H:i:s')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('updated_at')
                    ->label('更新時間')
                    ->dateTime('Y-m-d H:i:s')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                SelectFilter::make('status')
                    ->label('狀態')
                    ->options([
                        'available' => '可出租',
                        'rented' => '已出租',
                        'maintenance' => '維修中',
                        'pending_checkout' => '待結帳',
                    ])
                    ->placeholder('所有狀態'),

                TernaryFilter::make('is_active')
                    ->label('啟用狀態')
                    ->placeholder('所有狀態')
                    ->trueLabel('已啟用')
                    ->falseLabel('已停用')
                    ->native(false),
            ])
            ->defaultSort('created_at', 'desc');
    }
}
