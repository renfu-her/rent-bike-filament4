<?php

namespace App\Filament\Resources\Orders\Tables;

use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\SelectColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Table;

class OrdersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('order_no')
                    ->label('訂單編號')
                    ->searchable()
                    ->sortable()
                    ->weight('bold')
                    ->copyable(),

                TextColumn::make('store.name')
                    ->label('商店')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('member.name')
                    ->label('會員')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('total_price')
                    ->label('總金額')
                    ->money('TWD')
                    ->sortable(),

                TextColumn::make('rent_date')
                    ->label('租借日期')
                    ->date('Y-m-d')
                    ->sortable(),

                TextColumn::make('return_date')
                    ->label('歸還日期')
                    ->date('Y-m-d')
                    ->sortable(),

                IconColumn::make('is_completed')
                    ->label('完成狀態')
                    ->boolean()
                    ->trueIcon('heroicon-s-check-circle')
                    ->falseIcon('heroicon-s-clock')
                    ->trueColor('success')
                    ->falseColor('warning'),

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
                SelectFilter::make('store_id')
                    ->label('商店')
                    ->relationship('store', 'name')
                    ->placeholder('所有商店'),

                SelectFilter::make('member_id')
                    ->label('會員')
                    ->relationship('member', 'name')
                    ->placeholder('所有會員'),

                TernaryFilter::make('is_completed')
                    ->label('完成狀態')
                    ->placeholder('所有狀態')
                    ->trueLabel('已完成')
                    ->falseLabel('未完成')
                    ->native(false),
            ])
            ->defaultSort('created_at', 'desc');
    }
}
