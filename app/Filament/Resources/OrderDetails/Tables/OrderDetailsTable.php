<?php

namespace App\Filament\Resources\OrderDetails\Tables;

use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class OrderDetailsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('order.order_no')
                    ->label('訂單編號')
                    ->searchable()
                    ->sortable()
                    ->weight('bold'),

                TextColumn::make('motorcycle.name')
                    ->label('機車名稱')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('motorcycle.model')
                    ->label('機車型號')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('motorcycle.license_plate')
                    ->label('車牌號碼')
                    ->searchable()
                    ->copyable(),

                TextColumn::make('quantity')
                    ->label('數量')
                    ->sortable()
                    ->alignCenter(),

                TextColumn::make('subtotal')
                    ->label('小計')
                    ->money('TWD')
                    ->sortable(),

                TextColumn::make('total')
                    ->label('總計')
                    ->money('TWD')
                    ->sortable(),

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
                SelectFilter::make('order_id')
                    ->label('訂單')
                    ->relationship('order', 'order_no')
                    ->placeholder('所有訂單'),

                SelectFilter::make('motorcycle_id')
                    ->label('機車')
                    ->relationship('motorcycle', 'name')
                    ->placeholder('所有機車'),
            ])
            ->defaultSort('created_at', 'desc');
    }
}
